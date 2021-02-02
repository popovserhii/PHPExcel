<?php

require_once 'testDataFileIterator.php';

class FunctionsTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        PHPExcel_Calculation_Functions::setCompatibilityMode(PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL);
    }

    public function testDUMMY(): void
    {
        $result = PHPExcel_Calculation_Functions::DUMMY();
        self::assertEquals('#Not Yet Implemented', $result);
    }

    public function testDIV0(): void
    {
        $result = PHPExcel_Calculation_Functions::DIV0();
        self::assertEquals('#DIV/0!', $result);
    }

    public function testNA(): void
    {
        $result = PHPExcel_Calculation_Functions::NA();
        self::assertEquals('#N/A', $result);
    }

    public function testNaN(): void
    {
        $result = PHPExcel_Calculation_Functions::NaN();
        self::assertEquals('#NUM!', $result);
    }

    public function testNAME(): void
    {
        $result = PHPExcel_Calculation_Functions::NAME();
        self::assertEquals('#NAME?', $result);
    }

    public function testREF(): void
    {
        $result = PHPExcel_Calculation_Functions::REF();
        self::assertEquals('#REF!', $result);
    }

    public function testNULL(): void
    {
        $result = PHPExcel_Calculation_Functions::null();
        self::assertEquals('#NULL!', $result);
    }

    public function testVALUE(): void
    {
        $result = PHPExcel_Calculation_Functions::VALUE();
        self::assertEquals('#VALUE!', $result);
    }

    /**
     * @dataProvider providerIS_BLANK
     */
    public function testISBLANK(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_BLANK'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_BLANK()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_BLANK.data');
    }

    /**
     * @dataProvider providerIS_ERR
     */
    public function testISERR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_ERR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_ERR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_ERR.data');
    }

    /**
     * @dataProvider providerIS_ERROR
     */
    public function testISERROR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_ERROR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_ERROR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_ERROR.data');
    }

    /**
     * @dataProvider providerERROR_TYPE
     */
    public function testERRORTYPE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'ERROR_TYPE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerERROR_TYPE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/ERROR_TYPE.data');
    }

    /**
     * @dataProvider providerIS_LOGICAL
     */
    public function testISLOGICAL(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_LOGICAL'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_LOGICAL()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_LOGICAL.data');
    }

    /**
     * @dataProvider providerIS_NA
     */
    public function testISNA(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_NA'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_NA()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_NA.data');
    }

    /**
     * @dataProvider providerIS_NUMBER
     */
    public function testISNUMBER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_NUMBER'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_NUMBER()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_NUMBER.data');
    }

    /**
     * @dataProvider providerIS_TEXT
     */
    public function testISTEXT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_TEXT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_TEXT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_TEXT.data');
    }

    /**
     * @dataProvider providerIS_NONTEXT
     */
    public function testISNONTEXT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_NONTEXT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_NONTEXT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_NONTEXT.data');
    }

    /**
     * @dataProvider providerIS_EVEN
     */
    public function testISEVEN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_EVEN'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_EVEN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_EVEN.data');
    }

    /**
     * @dataProvider providerIS_ODD
     */
    public function testISODD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'IS_ODD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIS_ODD()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/IS_ODD.data');
    }

    /**
     * @dataProvider providerTYPE
     */
    public function testTYPE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'TYPE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerTYPE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/TYPE.data');
    }

    /**
     * @dataProvider providerN
     */
    public function testN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Functions', 'N'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Functions/N.data');
    }
}
