<?php

class AutoFilterTest extends PHPUnit\Framework\TestCase
{
    private $_testInitialRange = 'H2:O256';

    private $_testAutoFilterObject;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->_mockWorksheetObject = $this->getMockBuilder('PHPExcel_Worksheet')
            ->disableOriginalConstructor()
            ->getMock();
        $this->_mockCacheController = $this->getMockBuilder('PHPExcel_CachedObjectStorage_Memory')
            ->disableOriginalConstructor()
            ->getMock();
        $this->_mockWorksheetObject->expects(self::any())
            ->method('getCellCacheController')
            ->willReturn($this->_mockCacheController);

        $this->_testAutoFilterObject = new PHPExcel_Worksheet_AutoFilter(
            $this->_testInitialRange,
            $this->_mockWorksheetObject
        );
    }

    public function testToString(): void
    {
        $expectedResult = $this->_testInitialRange;

        //    magic __toString should return the active autofilter range
        $result = $this->_testAutoFilterObject;
        self::assertEquals($expectedResult, $result);
    }

    public function testGetParent(): void
    {
        $result = $this->_testAutoFilterObject->getParent();
        self::assertInstanceOf('PHPExcel_Worksheet', $result);
    }

    public function testSetParent(): void
    {
        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setParent($this->_mockWorksheetObject);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);
    }

    public function testGetRange(): void
    {
        $expectedResult = $this->_testInitialRange;

        //    Result should be the active autofilter range
        $result = $this->_testAutoFilterObject->getRange();
        self::assertEquals($expectedResult, $result);
    }

    public function testSetRange(): void
    {
        $ranges = ['G1:J512' => 'Worksheet1!G1:J512',
            'K1:N20' => 'K1:N20'
        ];

        foreach ($ranges as $actualRange => $fullRange) {
            //    Setters return the instance to implement the fluent interface
            $result = $this->_testAutoFilterObject->setRange($fullRange);
            self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

            //    Result should be the new autofilter range
            $result = $this->_testAutoFilterObject->getRange();
            self::assertEquals($actualRange, $result);
        }
    }

    public function testClearRange(): void
    {
        $expectedResult = '';

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setRange();
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

        //    Result should be a clear range
        $result = $this->_testAutoFilterObject->getRange();
        self::assertEquals($expectedResult, $result);
    }

    public function testSetRangeInvalidRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $expectedResult = 'A1';

        $result = $this->_testAutoFilterObject->setRange($expectedResult);
    }

    public function testGetColumnsEmpty(): void
    {
        //    There should be no columns yet defined
        $result = $this->_testAutoFilterObject->getColumns();
        self::assertIsArray($result);
        self::assertCount(0, $result);
    }

    public function testGetColumnOffset(): void
    {
        $columnIndexes = ['H' => 0,
            'K' => 3,
            'M' => 5
        ];

        //    If we request a specific column by its column ID, we should get an
        //    integer returned representing the column offset within the range
        foreach ($columnIndexes as $columnIndex => $columnOffset) {
            $result = $this->_testAutoFilterObject->getColumnOffset($columnIndex);
            self::assertEquals($columnOffset, $result);
        }
    }

    public function testGetInvalidColumnOffset(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $invalidColumn = 'G';

        $result = $this->_testAutoFilterObject->getColumnOffset($invalidColumn);
    }

    public function testSetColumnWithString(): void
    {
        $expectedResult = 'L';

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setColumn($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

        $result = $this->_testAutoFilterObject->getColumns();
        //    Result should be an array of PHPExcel_Worksheet_AutoFilter_Column
        //    objects for each column we set indexed by the column ID
        self::assertIsArray($result);
        self::assertCount(1, $result);
        self::assertArrayHasKey($expectedResult, $result);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result[$expectedResult]);
    }

    public function testSetInvalidColumnWithString(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $invalidColumn = 'A';

        $result = $this->_testAutoFilterObject->setColumn($invalidColumn);
    }

    public function testSetColumnWithColumnObject(): void
    {
        $expectedResult = 'M';
        $columnObject = new PHPExcel_Worksheet_AutoFilter_Column($expectedResult);

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setColumn($columnObject);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

        $result = $this->_testAutoFilterObject->getColumns();
        //    Result should be an array of PHPExcel_Worksheet_AutoFilter_Column
        //    objects for each column we set indexed by the column ID
        self::assertIsArray($result);
        self::assertCount(1, $result);
        self::assertArrayHasKey($expectedResult, $result);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result[$expectedResult]);
    }

    public function testSetInvalidColumnWithObject(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $invalidColumn = 'E';
        $columnObject = new PHPExcel_Worksheet_AutoFilter_Column($invalidColumn);

        $result = $this->_testAutoFilterObject->setColumn($invalidColumn);
    }

    public function testSetColumnWithInvalidDataType(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $invalidColumn = 123.456;
        $columnObject = new PHPExcel_Worksheet_AutoFilter_Column($invalidColumn);

        $result = $this->_testAutoFilterObject->setColumn($invalidColumn);
    }

    public function testGetColumns(): void
    {
        $columnIndexes = ['L', 'M'];

        foreach ($columnIndexes as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }

        $result = $this->_testAutoFilterObject->getColumns();
        //    Result should be an array of PHPExcel_Worksheet_AutoFilter_Column
        //    objects for each column we set indexed by the column ID
        self::assertIsArray($result);
        self::assertEquals(count($columnIndexes), count($result));
        foreach ($columnIndexes as $columnIndex) {
            self::assertArrayHasKey($columnIndex, $result);
            self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result[$columnIndex]);
        }
    }

    public function testGetColumn(): void
    {
        $columnIndexes = ['L', 'M'];

        foreach ($columnIndexes as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }

        //    If we request a specific column by its column ID, we should
        //    get a PHPExcel_Worksheet_AutoFilter_Column object returned
        foreach ($columnIndexes as $columnIndex) {
            $result = $this->_testAutoFilterObject->getColumn($columnIndex);
            self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
        }
    }

    public function testGetColumnByOffset(): void
    {
        $columnIndexes = [0 => 'H',
            3 => 'K',
            5 => 'M'
        ];

        //    If we request a specific column by its offset, we should
        //    get a PHPExcel_Worksheet_AutoFilter_Column object returned
        foreach ($columnIndexes as $columnIndex => $columnID) {
            $result = $this->_testAutoFilterObject->getColumnByOffset($columnIndex);
            self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
            self::assertEquals($result->getColumnIndex(), $columnID);
        }
    }

    public function testGetColumnIfNotSet(): void
    {
        //    If we request a specific column by its column ID, we should
        //    get a PHPExcel_Worksheet_AutoFilter_Column object returned
        $result = $this->_testAutoFilterObject->getColumn('K');
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
    }

    public function testGetColumnWithoutRangeSet(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        //    Clear the range
        $result = $this->_testAutoFilterObject->setRange();

        $result = $this->_testAutoFilterObject->getColumn('A');
    }

    public function testClearRangeWithExistingColumns(): void
    {
        $expectedResult = '';

        $columnIndexes = ['L', 'M', 'N'];
        foreach ($columnIndexes as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setRange();
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

        //    Range should be cleared
        $result = $this->_testAutoFilterObject->getRange();
        self::assertEquals($expectedResult, $result);

        //    Column array should be cleared
        $result = $this->_testAutoFilterObject->getColumns();
        self::assertIsArray($result);
        self::assertCount(0, $result);
    }

    public function testSetRangeWithExistingColumns(): void
    {
        $expectedResult = 'G1:J512';

        //    These columns should be retained
        $columnIndexes1 = ['I', 'J'];
        foreach ($columnIndexes1 as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }
        //    These columns should be discarded
        $columnIndexes2 = ['K', 'L', 'M'];
        foreach ($columnIndexes2 as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterObject->setRange($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);

        //    Range should be correctly set
        $result = $this->_testAutoFilterObject->getRange();
        self::assertEquals($expectedResult, $result);

        //    Only columns that existed in the original range and that
        //        still fall within the new range should be retained
        $result = $this->_testAutoFilterObject->getColumns();
        self::assertIsArray($result);
        self::assertEquals(count($columnIndexes1), count($result));
    }

    public function testClone(): void
    {
        $columnIndexes = ['L', 'M'];

        foreach ($columnIndexes as $columnIndex) {
            $this->_testAutoFilterObject->setColumn($columnIndex);
        }

        $result = clone $this->_testAutoFilterObject;
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);
    }
}
