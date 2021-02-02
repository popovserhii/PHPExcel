<?php

require_once 'testDataFileIterator.php';

class TextDataTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        PHPExcel_Calculation_Functions::setCompatibilityMode(PHPExcel_Calculation_Functions::COMPATIBILITY_EXCEL);
    }

    /**
     * @dataProvider providerCHAR
     */
    public function testCHAR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'CHARACTER'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCHAR()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/CHAR.data');
    }

    /**
     * @dataProvider providerCODE
     */
    public function testCODE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'ASCIICODE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCODE()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/CODE.data');
    }

    /**
     * @dataProvider providerCONCATENATE
     */
    public function testCONCATENATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'CONCATENATE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCONCATENATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/CONCATENATE.data');
    }

    /**
     * @dataProvider providerLEFT
     */
    public function testLEFT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'LEFT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerLEFT()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/LEFT.data');
    }

    /**
     * @dataProvider providerMID
     */
    public function testMID(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'MID'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerMID()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/MID.data');
    }

    /**
     * @dataProvider providerRIGHT
     */
    public function testRIGHT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'RIGHT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerRIGHT()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/RIGHT.data');
    }

    /**
     * @dataProvider providerLOWER
     */
    public function testLOWER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'LOWERCASE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerLOWER()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/LOWER.data');
    }

    /**
     * @dataProvider providerUPPER
     */
    public function testUPPER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'UPPERCASE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerUPPER()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/UPPER.data');
    }

    /**
     * @dataProvider providerPROPER
     */
    public function testPROPER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'PROPERCASE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerPROPER()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/PROPER.data');
    }

    /**
     * @dataProvider providerLEN
     */
    public function testLEN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'STRINGLENGTH'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerLEN()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/LEN.data');
    }

    /**
     * @dataProvider providerSEARCH
     */
    public function testSEARCH(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'SEARCHINSENSITIVE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerSEARCH()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/SEARCH.data');
    }

    /**
     * @dataProvider providerFIND
     */
    public function testFIND(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'SEARCHSENSITIVE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerFIND()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/FIND.data');
    }

    /**
     * @dataProvider providerREPLACE
     */
    public function testREPLACE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'REPLACE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerREPLACE()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/REPLACE.data');
    }

    /**
     * @dataProvider providerSUBSTITUTE
     */
    public function testSUBSTITUTE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'SUBSTITUTE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerSUBSTITUTE()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/SUBSTITUTE.data');
    }

    /**
     * @dataProvider providerTRIM
     */
    public function testTRIM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'TRIMSPACES'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerTRIM()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/TRIM.data');
    }

    /**
     * @dataProvider providerCLEAN
     */
    public function testCLEAN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'TRIMNONPRINTABLE'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCLEAN()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/CLEAN.data');
    }

    /**
     * @dataProvider providerDOLLAR
     */
    public function testDOLLAR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'DOLLAR'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDOLLAR()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/DOLLAR.data');
    }

    /**
     * @dataProvider providerFIXED
     */
    public function testFIXED(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'FIXEDFORMAT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerFIXED()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/FIXED.data');
    }

    /**
     * @dataProvider providerT
     */
    public function testT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'RETURNSTRING'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerT()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/T.data');
    }

    /**
     * @dataProvider providerTEXT
     */
    public function testTEXT(): void
    {
        //    Enforce decimal and thousands separator values to UK/US, and currency code to USD
        call_user_func(['PHPExcel_Shared_String', 'setDecimalSeparator'], '.');
        call_user_func(['PHPExcel_Shared_String', 'setThousandsSeparator'], ',');
        call_user_func(['PHPExcel_Shared_String', 'setCurrencyCode'], '$');

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'TEXTFORMAT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerTEXT()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/TEXT.data');
    }

    /**
     * @dataProvider providerVALUE
     */
    public function testVALUE(): void
    {
        call_user_func(['PHPExcel_Shared_String', 'setDecimalSeparator'], '.');
        call_user_func(['PHPExcel_Shared_String', 'setThousandsSeparator'], ' ');
        call_user_func(['PHPExcel_Shared_String', 'setCurrencyCode'], '$');

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_TextData', 'VALUE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerVALUE()
    {
        return new testDataFileIterator('rawTestData/Calculation/TextData/VALUE.data');
    }
}
