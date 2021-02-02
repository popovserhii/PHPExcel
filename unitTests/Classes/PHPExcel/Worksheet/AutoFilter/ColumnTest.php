<?php

class ColumnTest extends PHPUnit\Framework\TestCase
{
    private $_testInitialColumn = 'H';

    private $_testAutoFilterColumnObject;

    private $_mockAutoFilterObject;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->_mockAutoFilterObject = $this->getMockBuilder('PHPExcel_Worksheet_AutoFilter')
            ->disableOriginalConstructor()
            ->getMock();

        $this->_mockAutoFilterObject->expects(self::any())
            ->method('testColumnInRange')
            ->willReturn(3);

        $this->_testAutoFilterColumnObject = new PHPExcel_Worksheet_AutoFilter_Column(
            $this->_testInitialColumn,
            $this->_mockAutoFilterObject
        );
    }

    public function testGetColumnIndex(): void
    {
        $result = $this->_testAutoFilterColumnObject->getColumnIndex();
        self::assertEquals($this->_testInitialColumn, $result);
    }

    public function testSetColumnIndex(): void
    {
        $expectedResult = 'L';

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterColumnObject->setColumnIndex($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);

        $result = $this->_testAutoFilterColumnObject->getColumnIndex();
        self::assertEquals($expectedResult, $result);
    }

    public function testGetParent(): void
    {
        $result = $this->_testAutoFilterColumnObject->getParent();
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter', $result);
    }

    public function testSetParent(): void
    {
        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterColumnObject->setParent($this->_mockAutoFilterObject);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
    }

    public function testGetFilterType(): void
    {
        $result = $this->_testAutoFilterColumnObject->getFilterType();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_FILTER, $result);
    }

    public function testSetFilterType(): void
    {
        $result = $this->_testAutoFilterColumnObject->setFilterType(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);

        $result = $this->_testAutoFilterColumnObject->getFilterType();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_FILTERTYPE_DYNAMICFILTER, $result);
    }

    public function testSetInvalidFilterTypeThrowsException(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $expectedResult = 'Unfiltered';

        $result = $this->_testAutoFilterColumnObject->setFilterType($expectedResult);
    }

    public function testGetJoin(): void
    {
        $result = $this->_testAutoFilterColumnObject->getJoin();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_OR, $result);
    }

    public function testSetJoin(): void
    {
        $result = $this->_testAutoFilterColumnObject->setJoin(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);

        $result = $this->_testAutoFilterColumnObject->getJoin();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column::AUTOFILTER_COLUMN_JOIN_AND, $result);
    }

    public function testSetInvalidJoinThrowsException(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $expectedResult = 'Neither';

        $result = $this->_testAutoFilterColumnObject->setJoin($expectedResult);
    }

    public function testSetAttributes(): void
    {
        $attributeSet = ['val' => 100,
            'maxVal' => 200
        ];

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterColumnObject->setAttributes($attributeSet);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
    }

    public function testGetAttributes(): void
    {
        $attributeSet = ['val' => 100,
            'maxVal' => 200
        ];

        $this->_testAutoFilterColumnObject->setAttributes($attributeSet);

        $result = $this->_testAutoFilterColumnObject->getAttributes();
        self::assertIsArray($result);
        self::assertEquals(count($attributeSet), count($result));
    }

    public function testSetAttribute(): void
    {
        $attributeSet = ['val' => 100,
            'maxVal' => 200
        ];

        foreach ($attributeSet as $attributeName => $attributeValue) {
            //    Setters return the instance to implement the fluent interface
            $result = $this->_testAutoFilterColumnObject->setAttribute($attributeName, $attributeValue);
            self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
        }
    }

    public function testGetAttribute(): void
    {
        $attributeSet = ['val' => 100,
            'maxVal' => 200
        ];

        $this->_testAutoFilterColumnObject->setAttributes($attributeSet);

        foreach ($attributeSet as $attributeName => $attributeValue) {
            $result = $this->_testAutoFilterColumnObject->getAttribute($attributeName);
            self::assertEquals($attributeValue, $result);
        }
        $result = $this->_testAutoFilterColumnObject->getAttribute('nonExistentAttribute');
        self::assertNull($result);
    }

    public function testClone(): void
    {
        $result = clone $this->_testAutoFilterColumnObject;
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
    }
}
