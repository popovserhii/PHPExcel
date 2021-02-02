<?php

require_once 'testDataFileIterator.php';

class FinancialTest extends PHPUnit\Framework\TestCase
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
     * @dataProvider providerACCRINT
     */
    public function testACCRINT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'ACCRINT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerACCRINT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/ACCRINT.data');
    }

    /**
     * @dataProvider providerACCRINTM
     */
    public function testACCRINTM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'ACCRINTM'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerACCRINTM()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/ACCRINTM.data');
    }

    /**
     * @dataProvider providerAMORDEGRC
     */
    public function testAMORDEGRC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'AMORDEGRC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerAMORDEGRC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/AMORDEGRC.data');
    }

    /**
     * @dataProvider providerAMORLINC
     */
    public function testAMORLINC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'AMORLINC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerAMORLINC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/AMORLINC.data');
    }

    /**
     * @dataProvider providerCOUPDAYBS
     */
    public function testCOUPDAYBS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPDAYBS'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPDAYBS()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPDAYBS.data');
    }

    /**
     * @dataProvider providerCOUPDAYS
     */
    public function testCOUPDAYS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPDAYS'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPDAYS()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPDAYS.data');
    }

    /**
     * @dataProvider providerCOUPDAYSNC
     */
    public function testCOUPDAYSNC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPDAYSNC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPDAYSNC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPDAYSNC.data');
    }

    /**
     * @dataProvider providerCOUPNCD
     */
    public function testCOUPNCD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPNCD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPNCD()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPNCD.data');
    }

    /**
     * @dataProvider providerCOUPNUM
     */
    public function testCOUPNUM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPNUM'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPNUM()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPNUM.data');
    }

    /**
     * @dataProvider providerCOUPPCD
     */
    public function testCOUPPCD(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'COUPPCD'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCOUPPCD()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/COUPPCD.data');
    }

    /**
     * @dataProvider providerCUMIPMT
     */
    public function testCUMIPMT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'CUMIPMT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCUMIPMT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/CUMIPMT.data');
    }

    /**
     * @dataProvider providerCUMPRINC
     */
    public function testCUMPRINC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'CUMPRINC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerCUMPRINC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/CUMPRINC.data');
    }

    /**
     * @dataProvider providerDB
     */
    public function testDB(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'DB'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDB()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/DB.data');
    }

    /**
     * @dataProvider providerDDB
     */
    public function testDDB(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'DDB'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDDB()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/DDB.data');
    }

    /**
     * @dataProvider providerDISC
     */
    public function testDISC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'DISC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDISC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/DISC.data');
    }

    /**
     * @dataProvider providerDOLLARDE
     */
    public function testDOLLARDE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'DOLLARDE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDOLLARDE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/DOLLARDE.data');
    }

    /**
     * @dataProvider providerDOLLARFR
     */
    public function testDOLLARFR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'DOLLARFR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDOLLARFR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/DOLLARFR.data');
    }

    /**
     * @dataProvider providerEFFECT
     */
    public function testEFFECT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'EFFECT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerEFFECT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/EFFECT.data');
    }

    /**
     * @dataProvider providerFV
     */
    public function testFV(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'FV'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerFV()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/FV.data');
    }

    /**
     * @dataProvider providerFVSCHEDULE
     */
    public function testFVSCHEDULE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'FVSCHEDULE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerFVSCHEDULE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/FVSCHEDULE.data');
    }

    /**
     * @dataProvider providerINTRATE
     */
    public function testINTRATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'INTRATE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerINTRATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/INTRATE.data');
    }

    /**
     * @dataProvider providerIPMT
     */
    public function testIPMT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'IPMT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIPMT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/IPMT.data');
    }

    /**
     * @dataProvider providerIRR
     */
    public function testIRR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'IRR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIRR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/IRR.data');
    }

    /**
     * @dataProvider providerISPMT
     */
    public function testISPMT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'ISPMT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerISPMT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/ISPMT.data');
    }

    /**
     * @dataProvider providerMIRR
     */
    public function testMIRR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'MIRR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerMIRR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/MIRR.data');
    }

    /**
     * @dataProvider providerNOMINAL
     */
    public function testNOMINAL(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'NOMINAL'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerNOMINAL()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/NOMINAL.data');
    }

    /**
     * @dataProvider providerNPER
     */
    public function testNPER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'NPER'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerNPER()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/NPER.data');
    }

    /**
     * @dataProvider providerNPV
     */
    public function testNPV(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'NPV'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerNPV()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/NPV.data');
    }

    /**
     * @dataProvider providerPRICE
     */
    public function testPRICE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'PRICE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerPRICE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/PRICE.data');
    }

    /**
     * @dataProvider providerRATE
     */
    public function testRATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'RATE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerRATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/RATE.data');
    }

    /**
     * @dataProvider providerXIRR
     */
    public function testXIRR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Financial', 'XIRR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerXIRR()
    {
        return new testDataFileIterator('rawTestData/Calculation/Financial/XIRR.data');
    }
}
