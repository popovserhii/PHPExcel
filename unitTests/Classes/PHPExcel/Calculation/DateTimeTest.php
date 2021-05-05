<?php

require_once 'testDataFileIterator.php';

class DateTimeTest extends PHPUnit\Framework\TestCase
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
     * @dataProvider providerDATE
     */
    public function testDATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DATE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/DATE.data');
    }

    public function testDATEtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::DATE(2012, 1, 31);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(1327968000, $result, null, 1E-8);
    }

    public function testDATEtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::DATE(2012, 1, 31);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('d-M-Y'), '31-Jan-2012');
    }

    public function testDATEwith1904Calendar(): void
    {
        PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_MAC_1904);
        $result = PHPExcel_Calculation_DateTime::DATE(1918, 11, 11);
        PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900);
        self::assertEquals($result, 5428);
    }

    public function testDATEwith1904CalendarError(): void
    {
        PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_MAC_1904);
        $result = PHPExcel_Calculation_DateTime::DATE(1901, 1, 31);
        PHPExcel_Shared_Date::setExcelCalendar(PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900);
        self::assertEquals($result, '#NUM!');
    }

    /**
     * @dataProvider providerDATEVALUE
     */
    public function testDATEVALUE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DATEVALUE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDATEVALUE()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/DATEVALUE.data');
    }

    public function testDATEVALUEtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::DATEVALUE('2012-1-31');
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(1327968000, $result, null, 1E-8);
    }

    public function testDATEVALUEtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::DATEVALUE('2012-1-31');
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('d-M-Y'), '31-Jan-2012');
    }

    /**
     * @dataProvider providerYEAR
     */
    public function testYEAR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'YEAR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerYEAR()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/YEAR.data');
    }

    /**
     * @dataProvider providerMONTH
     */
    public function testMONTH(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'MONTHOFYEAR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerMONTH()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/MONTH.data');
    }

    /**
     * @dataProvider providerWEEKNUM
     */
    public function testWEEKNUM(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'WEEKOFYEAR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerWEEKNUM()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/WEEKNUM.data');
    }

    /**
     * @dataProvider providerWEEKDAY
     */
    public function testWEEKDAY(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DAYOFWEEK'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerWEEKDAY()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/WEEKDAY.data');
    }

    /**
     * @dataProvider providerDAY
     */
    public function testDAY(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DAYOFMONTH'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDAY()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/DAY.data');
    }

    /**
     * @dataProvider providerTIME
     */
    public function testTIME(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'TIME'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerTIME()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/TIME.data');
    }

    public function testTIMEtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::TIME(7, 30, 20);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(27020, $result, null, 1E-8);
    }

    public function testTIMEtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::TIME(7, 30, 20);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('H:i:s'), '07:30:20');
    }

    /**
     * @dataProvider providerTIMEVALUE
     */
    public function testTIMEVALUE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'TIMEVALUE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerTIMEVALUE()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/TIMEVALUE.data');
    }

    public function testTIMEVALUEtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::TIMEVALUE('7:30:20');
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(23420, $result, null, 1E-8);
    }

    public function testTIMEVALUEtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::TIMEVALUE('7:30:20');
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('H:i:s'), '07:30:20');
    }

    /**
     * @dataProvider providerHOUR
     */
    public function testHOUR(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'HOUROFDAY'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerHOUR()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/HOUR.data');
    }

    /**
     * @dataProvider providerMINUTE
     */
    public function testMINUTE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'MINUTEOFHOUR'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerMINUTE()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/MINUTE.data');
    }

    /**
     * @dataProvider providerSECOND
     */
    public function testSECOND(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'SECONDOFMINUTE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerSECOND()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/SECOND.data');
    }

    /**
     * @dataProvider providerNETWORKDAYS
     */
    public function testNETWORKDAYS(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'NETWORKDAYS'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerNETWORKDAYS()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/NETWORKDAYS.data');
    }

    /**
     * @dataProvider providerWORKDAY
     */
    public function testWORKDAY(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'WORKDAY'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerWORKDAY()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/WORKDAY.data');
    }

    /**
     * @dataProvider providerEDATE
     */
    public function testEDATE(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'EDATE'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerEDATE()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/EDATE.data');
    }

    public function testEDATEtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::EDATE('2012-1-26', -1);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(1324857600, $result, null, 1E-8);
    }

    public function testEDATEtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::EDATE('2012-1-26', -1);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('d-M-Y'), '26-Dec-2011');
    }

    /**
     * @dataProvider providerEOMONTH
     */
    public function testEOMONTH(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'EOMONTH'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerEOMONTH()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/EOMONTH.data');
    }

    public function testEOMONTHtoPHP(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_NUMERIC);
        $result = PHPExcel_Calculation_DateTime::EOMONTH('2012-1-26', -1);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        self::assertEquals(1325289600, $result, null, 1E-8);
    }

    public function testEOMONTHtoPHPObject(): void
    {
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_PHP_OBJECT);
        $result = PHPExcel_Calculation_DateTime::EOMONTH('2012-1-26', -1);
        PHPExcel_Calculation_Functions::setReturnDateType(PHPExcel_Calculation_Functions::RETURNDATE_EXCEL);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'DateTime'));
        //    ... with the correct value
        self::assertEquals($result->format('d-M-Y'), '31-Dec-2011');
    }

    /**
     * @dataProvider providerDATEDIF
     */
    public function testDATEDIF(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DATEDIF'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDATEDIF()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/DATEDIF.data');
    }

    /**
     * @dataProvider providerDAYS360
     */
    public function testDAYS360(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'DAYS360'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerDAYS360()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/DAYS360.data');
    }

    /**
     * @dataProvider providerYEARFRAC
     */
    public function testYEARFRAC(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Calculation_DateTime', 'YEARFRAC'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-8);
    }

    public function providerYEARFRAC()
    {
        return new testDataFileIterator('rawTestData/Calculation/DateTime/YEARFRAC.data');
    }
}
