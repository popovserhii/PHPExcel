<?php

require_once 'testDataFileIterator.php';

class LogicalTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        PHPExcel_Calculation_Functions::setCompatibilityMode(PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL);
    }

    public function testTRUE(): void
    {
        $result = PHPExcel_Calculation_Logical::TRUE();
        self::assertTrue($result);
    }

    public function testFALSE(): void
    {
        $result = PHPExcel_Calculation_Logical::FALSE();
        self::assertFalse($result);
    }

    /**
     * @dataProvider providerAND
     */
    public function testAND(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Logical', 'LOGICAL_AND'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerAND()
    {
        return new testDataFileIterator('rawTestData/Calculation/Logical/AND.data');
    }

    /**
     * @dataProvider providerOR
     */
    public function testOR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Logical', 'LOGICAL_OR'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerOR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Logical/OR.data');
    }

    /**
     * @dataProvider providerNOT
     */
    public function testNOT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Logical', 'NOT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerNOT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Logical/NOT.data');
    }

    /**
     * @dataProvider providerIF
     */
    public function testIF(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Logical', 'STATEMENT_IF'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerIF()
    {
        return new testDataFileIterator('rawTestData/Calculation/Logical/IF.data');
    }

    /**
     * @dataProvider providerIFERROR
     */
    public function testIFERROR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Logical', 'IFERROR'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerIFERROR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Logical/IFERROR.data');
    }
}
