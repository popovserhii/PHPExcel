<?php

require_once 'testDataFileIterator.php';

class CellTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    /**
     * @dataProvider providerColumnString
     */
    public function testColumnIndexFromString(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'columnIndexFromString'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColumnString()
    {
        return new testDataFileIterator('rawTestData/ColumnString.data');
    }

    public function testColumnIndexFromStringTooLong(): void
    {
        $cellAddress = 'ABCD';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'columnIndexFromString'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Column string index can not be longer than 3 characters');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    public function testColumnIndexFromStringTooShort(): void
    {
        $cellAddress = '';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'columnIndexFromString'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Column string index can not be empty');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    /**
     * @dataProvider providerColumnIndex
     */
    public function testStringFromColumnIndex(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'stringFromColumnIndex'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColumnIndex()
    {
        return new testDataFileIterator('rawTestData/ColumnIndex.data');
    }

    /**
     * @dataProvider providerCoordinates
     */
    public function testCoordinateFromString(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'coordinateFromString'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCoordinates()
    {
        return new testDataFileIterator('rawTestData/CellCoordinates.data');
    }

    public function testCoordinateFromStringWithRangeAddress(): void
    {
        $cellAddress = 'A1:AI2012';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'coordinateFromString'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Cell coordinate string can not be a range of cells');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    public function testCoordinateFromStringWithEmptyAddress(): void
    {
        $cellAddress = '';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'coordinateFromString'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Cell coordinate can not be zero-length string');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    public function testCoordinateFromStringWithInvalidAddress(): void
    {
        $cellAddress = 'AI';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'coordinateFromString'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Invalid cell coordinate ' . $cellAddress);

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    /**
     * @dataProvider providerAbsoluteCoordinates
     */
    public function testAbsoluteCoordinateFromString(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'absoluteCoordinate'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerAbsoluteCoordinates()
    {
        return new testDataFileIterator('rawTestData/CellAbsoluteCoordinate.data');
    }

    public function testAbsoluteCoordinateFromStringWithRangeAddress(): void
    {
        $cellAddress = 'A1:AI2012';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'absoluteCoordinate'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Cell coordinate string can not be a range of cells');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    /**
     * @dataProvider providerAbsoluteReferences
     */
    public function testAbsoluteReferenceFromString(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'absoluteReference'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerAbsoluteReferences()
    {
        return new testDataFileIterator('rawTestData/CellAbsoluteReference.data');
    }

    public function testAbsoluteReferenceFromStringWithRangeAddress(): void
    {
        $cellAddress = 'A1:AI2012';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'absoluteReference'], $cellAddress);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Cell coordinate string can not be a range of cells');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    /**
     * @dataProvider providerSplitRange
     */
    public function testSplitRange(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'splitRange'], $args);
        foreach ($result as $key => $split) {
            if (!is_array($expectedResult[$key])) {
                self::assertEquals($expectedResult[$key], $split[0]);
            } else {
                self::assertEquals($expectedResult[$key], $split);
            }
        }
    }

    public function providerSplitRange()
    {
        return new testDataFileIterator('rawTestData/CellSplitRange.data');
    }

    /**
     * @dataProvider providerBuildRange
     */
    public function testBuildRange(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'buildRange'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerBuildRange()
    {
        return new testDataFileIterator('rawTestData/CellBuildRange.data');
    }

    public function testBuildRangeInvalid(): void
    {
        $cellRange = '';

        try {
            $result = call_user_func(['PHPExcel_Cell', 'buildRange'], $cellRange);
        } catch (PHPExcel_Exception $e) {
            self::assertEquals($e->getMessage(), 'Range does not contain any information');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    /**
     * @dataProvider providerRangeBoundaries
     */
    public function testRangeBoundaries(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'rangeBoundaries'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerRangeBoundaries()
    {
        return new testDataFileIterator('rawTestData/CellRangeBoundaries.data');
    }

    /**
     * @dataProvider providerRangeDimension
     */
    public function testRangeDimension(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'rangeDimension'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerRangeDimension()
    {
        return new testDataFileIterator('rawTestData/CellRangeDimension.data');
    }

    /**
     * @dataProvider providerGetRangeBoundaries
     */
    public function testGetRangeBoundaries(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'getRangeBoundaries'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerGetRangeBoundaries()
    {
        return new testDataFileIterator('rawTestData/CellGetRangeBoundaries.data');
    }

    /**
     * @dataProvider providerExtractAllCellReferencesInRange
     */
    public function testExtractAllCellReferencesInRange(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell', 'extractAllCellReferencesInRange'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerExtractAllCellReferencesInRange()
    {
        return new testDataFileIterator('rawTestData/CellExtractAllCellReferencesInRange.data');
    }
}
