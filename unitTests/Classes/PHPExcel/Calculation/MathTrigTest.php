<?php

require_once 'testDataFileIterator.php';

class MathTrigTest extends PHPUnit\Framework\TestCase
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
     * @dataProvider providerATAN2
     */
    public function testATAN2(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'ATAN2'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerATAN2()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/ATAN2.data');
    }

    /**
     * @dataProvider providerCEILING
     */
    public function testCEILING(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'CEILING'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerCEILING()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/CEILING.data');
    }

    /**
     * @dataProvider providerCOMBIN
     */
    public function testCOMBIN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'COMBIN'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerCOMBIN()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/COMBIN.data');
    }

    /**
     * @dataProvider providerEVEN
     */
    public function testEVEN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'EVEN'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerEVEN()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/EVEN.data');
    }

    /**
     * @dataProvider providerODD
     */
    public function testODD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'ODD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerODD()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/ODD.data');
    }

    /**
     * @dataProvider providerFACT
     */
    public function testFACT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'FACT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerFACT()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/FACT.data');
    }

    /**
     * @dataProvider providerFACTDOUBLE
     */
    public function testFACTDOUBLE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'FACTDOUBLE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerFACTDOUBLE()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/FACTDOUBLE.data');
    }

    /**
     * @dataProvider providerFLOOR
     */
    public function testFLOOR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'FLOOR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerFLOOR()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/FLOOR.data');
    }

    /**
     * @dataProvider providerGCD
     */
    public function testGCD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'GCD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerGCD()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/GCD.data');
    }

    /**
     * @dataProvider providerLCM
     */
    public function testLCM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'LCM'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerLCM()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/LCM.data');
    }

    /**
     * @dataProvider providerINT
     */
    public function testINT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'INT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerINT()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/INT.data');
    }

    /**
     * @dataProvider providerSIGN
     */
    public function testSIGN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SIGN'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSIGN()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/SIGN.data');
    }

    /**
     * @dataProvider providerPOWER
     */
    public function testPOWER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'POWER'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerPOWER()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/POWER.data');
    }

    /**
     * @dataProvider providerLOG
     */
    public function testLOG(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'LOG_BASE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerLOG()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/LOG.data');
    }

    /**
     * @dataProvider providerMOD
     */
    public function testMOD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MOD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMOD()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MOD.data');
    }

    /**
     * @dataProvider providerMDETERM
     */
    public function testMDETERM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MDETERM'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMDETERM()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MDETERM.data');
    }

    /**
     * @dataProvider providerMINVERSE
     */
    public function testMINVERSE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MINVERSE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMINVERSE()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MINVERSE.data');
    }

    /**
     * @dataProvider providerMMULT
     */
    public function testMMULT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MMULT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMMULT()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MMULT.data');
    }

    /**
     * @dataProvider providerMULTINOMIAL
     */
    public function testMULTINOMIAL(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MULTINOMIAL'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMULTINOMIAL()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MULTINOMIAL.data');
    }

    /**
     * @dataProvider providerMROUND
     */
    public function testMROUND(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        PHPExcel_Calculation::setArrayReturnType(PHPExcel_Calculation::RETURN_ARRAY_AS_VALUE);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'MROUND'], $args);
        PHPExcel_Calculation::setArrayReturnType(PHPExcel_Calculation::RETURN_ARRAY_AS_ARRAY);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerMROUND()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/MROUND.data');
    }

    /**
     * @dataProvider providerPRODUCT
     */
    public function testPRODUCT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'PRODUCT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerPRODUCT()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/PRODUCT.data');
    }

    /**
     * @dataProvider providerQUOTIENT
     */
    public function testQUOTIENT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'QUOTIENT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerQUOTIENT()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/QUOTIENT.data');
    }

    /**
     * @dataProvider providerROUNDUP
     */
    public function testROUNDUP(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'ROUNDUP'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerROUNDUP()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/ROUNDUP.data');
    }

    /**
     * @dataProvider providerROUNDDOWN
     */
    public function testROUNDDOWN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'ROUNDDOWN'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerROUNDDOWN()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/ROUNDDOWN.data');
    }

    /**
     * @dataProvider providerSERIESSUM
     */
    public function testSERIESSUM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SERIESSUM'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSERIESSUM()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/SERIESSUM.data');
    }

    /**
     * @dataProvider providerSUMIFS
     */
    public function testSUMIFS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SUMIFS'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSUMIFS()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/SUMIFS.data');
    }

    /**
     * @dataProvider providerSUMSQ
     */
    public function testSUMSQ(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SUMSQ'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSUMSQ()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/SUMSQ.data');
    }

    /**
     * @dataProvider providerTRUNC
     */
    public function testTRUNC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'TRUNC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerTRUNC()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/TRUNC.data');
    }

    /**
     * @dataProvider providerROMAN
     */
    public function testROMAN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'ROMAN'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerROMAN()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/ROMAN.data');
    }

    /**
     * @dataProvider providerSQRTPI
     */
    public function testSQRTPI(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SQRTPI'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSQRTPI()
    {
        return new testDataFileIterator('rawTestData/Calculation/MathTrig/SQRTPI.data');
    }

    /**
     * @dataProvider providerSUMIF
     */
    public function testSUMIF(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_MathTrig', 'SUMIF'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerSUMIF()
    {
        return [
            [
                [
                    [1],
                    [5],
                    [10],
                ],
                '>=5',
                15,
            ],
            [
                [
                    ['text'],
                    [2],
                ],
                '=text',
                [
                    [10],
                    [100],
                ],
                10,
            ],
            [
                [
                    ['"text with quotes"'],
                    [2],
                ],
                '="text with quotes"',
                [
                    [10],
                    [100],
                ],
                10,
            ],
            [
                [
                    ['"text with quotes"'],
                    [''],
                ],
                '>"', // Compare to the single characater " (double quote)
                [
                    [10],
                    [100],
                ],
                10
            ],
            [
                [
                    [''],
                    ['anything'],
                ],
                '>"', // Compare to the single characater " (double quote)
                [
                    [10],
                    [100],
                ],
                100
            ],
        ];
    }
}
