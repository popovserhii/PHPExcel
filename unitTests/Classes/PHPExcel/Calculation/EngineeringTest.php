<?php

//  Custom assertion class for handling precision of Complex numbers
require_once 'custom/complexAssert.php';

//  Data Provider handler
require_once 'testDataFileIterator.php';

class EngineeringTest extends PHPUnit\Framework\TestCase
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
     * @dataProvider providerBESSELI
     */
    public function testBESSELI(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BESSELI'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerBESSELI()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BESSELI.data');
    }

    /**
     * @dataProvider providerBESSELJ
     */
    public function testBESSELJ(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BESSELJ'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerBESSELJ()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BESSELJ.data');
    }

    /**
     * @dataProvider providerBESSELK
     */
    public function testBESSELK(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BESSELK'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerBESSELK()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BESSELK.data');
    }

    /**
     * @dataProvider providerBESSELY
     */
    public function testBESSELY(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BESSELY'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerBESSELY()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BESSELY.data');
    }

    /**
     * @dataProvider providerCOMPLEX
     */
    public function testCOMPLEX(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'COMPLEX'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCOMPLEX()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/COMPLEX.data');
    }

    /**
     * @dataProvider providerIMAGINARY
     */
    public function testIMAGINARY(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMAGINARY'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIMAGINARY()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMAGINARY.data');
    }

    /**
     * @dataProvider providerIMREAL
     */
    public function testIMREAL(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMREAL'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIMREAL()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMREAL.data');
    }

    /**
     * @dataProvider providerIMABS
     */
    public function testIMABS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMABS'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIMABS()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMABS.data');
    }

    /**
     * @dataProvider providerIMARGUMENT
     */
    public function testIMARGUMENT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMARGUMENT'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerIMARGUMENT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMARGUMENT.data');
    }

    /**
     * @dataProvider providerIMCONJUGATE
     */
    public function testIMCONJUGATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMCONJUGATE'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMCONJUGATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMCONJUGATE.data');
    }

    /**
     * @dataProvider providerIMCOS
     */
    public function testIMCOS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMCOS'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMCOS()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMCOS.data');
    }

    /**
     * @dataProvider providerIMDIV
     */
    public function testIMDIV(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMDIV'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMDIV()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMDIV.data');
    }

    /**
     * @dataProvider providerIMEXP
     */
    public function testIMEXP(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMEXP'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMEXP()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMEXP.data');
    }

    /**
     * @dataProvider providerIMLN
     */
    public function testIMLN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMLN'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMLN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMLN.data');
    }

    /**
     * @dataProvider providerIMLOG2
     */
    public function testIMLOG2(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMLOG2'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMLOG2()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMLOG2.data');
    }

    /**
     * @dataProvider providerIMLOG10
     */
    public function testIMLOG10(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMLOG10'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMLOG10()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMLOG10.data');
    }

    /**
     * @dataProvider providerIMPOWER
     */
    public function testIMPOWER(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMPOWER'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMPOWER()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMPOWER.data');
    }

    /**
     * @dataProvider providerIMPRODUCT
     */
    public function testIMPRODUCT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMPRODUCT'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMPRODUCT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMPRODUCT.data');
    }

    /**
     * @dataProvider providerIMSIN
     */
    public function testIMSIN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMSIN'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMSIN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMSIN.data');
    }

    /**
     * @dataProvider providerIMSQRT
     */
    public function testIMSQRT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMSQRT'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMSQRT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMSQRT.data');
    }

    /**
     * @dataProvider providerIMSUB
     */
    public function testIMSUB(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMSUB'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMSUB()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMSUB.data');
    }

    /**
     * @dataProvider providerIMSUM
     */
    public function testIMSUM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'IMSUM'], $args);
        $complexAssert = new complexAssert();
        self::assertTrue($complexAssert->assertComplexEquals($expectedResult, $result, 1E-8), $complexAssert->getErrorMessage());
    }

    public function providerIMSUM()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/IMSUM.data');
    }

    /**
     * @dataProvider providerERF
     */
    public function testERF(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'ERF'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerERF()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/ERF.data');
    }

    /**
     * @dataProvider providerERFC
     */
    public function testERFC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'ERFC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-12);
    }

    public function providerERFC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/ERFC.data');
    }

    /**
     * @dataProvider providerBIN2DEC
     */
    public function testBIN2DEC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BINTODEC'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerBIN2DEC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BIN2DEC.data');
    }

    /**
     * @dataProvider providerBIN2HEX
     */
    public function testBIN2HEX(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BINTOHEX'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerBIN2HEX()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BIN2HEX.data');
    }

    /**
     * @dataProvider providerBIN2OCT
     */
    public function testBIN2OCT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'BINTOOCT'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerBIN2OCT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/BIN2OCT.data');
    }

    /**
     * @dataProvider providerDEC2BIN
     */
    public function testDEC2BIN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'DECTOBIN'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerDEC2BIN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/DEC2BIN.data');
    }

    /**
     * @dataProvider providerDEC2HEX
     */
    public function testDEC2HEX(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'DECTOHEX'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerDEC2HEX()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/DEC2HEX.data');
    }

    /**
     * @dataProvider providerDEC2OCT
     */
    public function testDEC2OCT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'DECTOOCT'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerDEC2OCT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/DEC2OCT.data');
    }

    /**
     * @dataProvider providerHEX2BIN
     */
    public function testHEX2BIN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'HEXTOBIN'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerHEX2BIN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/HEX2BIN.data');
    }

    /**
     * @dataProvider providerHEX2DEC
     */
    public function testHEX2DEC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'HEXTODEC'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerHEX2DEC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/HEX2DEC.data');
    }

    /**
     * @dataProvider providerHEX2OCT
     */
    public function testHEX2OCT(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'HEXTOOCT'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerHEX2OCT()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/HEX2OCT.data');
    }

    /**
     * @dataProvider providerOCT2BIN
     */
    public function testOCT2BIN(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'OCTTOBIN'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerOCT2BIN()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/OCT2BIN.data');
    }

    /**
     * @dataProvider providerOCT2DEC
     */
    public function testOCT2DEC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'OCTTODEC'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerOCT2DEC()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/OCT2DEC.data');
    }

    /**
     * @dataProvider providerOCT2HEX
     */
    public function testOCT2HEX(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'OCTTOHEX'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerOCT2HEX()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/OCT2HEX.data');
    }

    /**
     * @dataProvider providerDELTA
     */
    public function testDELTA(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'DELTA'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerDELTA()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/DELTA.data');
    }

    /**
     * @dataProvider providerGESTEP
     */
    public function testGESTEP(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'GESTEP'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerGESTEP()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/GESTEP.data');
    }

    public function testGetConversionGroups(): void
    {
        $result = PHPExcel_Calculation_Engineering::getConversionGroups();
        self::assertIsArray($result);
    }

    public function testGetConversionGroupUnits(): void
    {
        $result = PHPExcel_Calculation_Engineering::getConversionGroupUnits();
        self::assertIsArray($result);
    }

    public function testGetConversionGroupUnitDetails(): void
    {
        $result = PHPExcel_Calculation_Engineering::getConversionGroupUnitDetails();
        self::assertIsArray($result);
    }

    public function testGetConversionMultipliers(): void
    {
        $result = PHPExcel_Calculation_Engineering::getConversionMultipliers();
        self::assertIsArray($result);
    }

    /**
     * @dataProvider providerCONVERTUOM
     */
    public function testCONVERTUOM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_Engineering', 'CONVERTUOM'], $args);
        self::assertEquals($expectedResult, $result, null);
    }

    public function providerCONVERTUOM()
    {
        return new testDataFileIterator('rawTestData/Calculation/Engineering/CONVERTUOM.data');
    }
}
