<?php

require_once 'testDataFileIterator.php';

class DateTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testSetExcelCalendar(): void
    {
        $calendarValues = [
            PHPExcel_Shared_Date::CALENDAR_MAC_1904,
            PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900,
        ];

        foreach ($calendarValues as $calendarValue) {
            $result = call_user_func(['PHPExcel_Shared_Date', 'setExcelCalendar'], $calendarValue);
            self::assertTrue($result);
        }
    }

    public function testSetExcelCalendarWithInvalidValue(): void
    {
        $unsupportedCalendar = '2012';
        $result = call_user_func(['PHPExcel_Shared_Date', 'setExcelCalendar'], $unsupportedCalendar);
        self::assertFalse($result);
    }

    /**
     * @dataProvider providerDateTimeExcelToPHP1900
     */
    public function testDateTimeExcelToPHP1900(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        if ($args[0] < 1) {
            $expectedResult += gmmktime(0, 0, 0);
        }
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'ExcelToPHP'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToPHP1900()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimeExcelToPHP1900.data');
    }

    /**
     * @dataProvider providerDateTimePHPToExcel1900
     */
    public function testDateTimePHPToExcel1900(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'PHPToExcel'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimePHPToExcel1900()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimePHPToExcel1900.data');
    }

    /**
     * @dataProvider providerDateTimeFormattedPHPToExcel1900
     */
    public function testDateTimeFormattedPHPToExcel1900(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'FormattedPHPToExcel'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimeFormattedPHPToExcel1900()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimeFormattedPHPToExcel1900.data');
    }

    /**
     * @dataProvider providerDateTimeExcelToPHP1904
     */
    public function testDateTimeExcelToPHP1904(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_MAC_1904
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        if ($args[0] < 1) {
            $expectedResult += gmmktime(0, 0, 0);
        }
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'ExcelToPHP'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToPHP1904()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimeExcelToPHP1904.data');
    }

    /**
     * @dataProvider providerDateTimePHPToExcel1904
     */
    public function testDateTimePHPToExcel1904(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_MAC_1904
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'PHPToExcel'], $args);
        self::assertEquals($expectedResult, $result, null, 1E-5);
    }

    public function providerDateTimePHPToExcel1904()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimePHPToExcel1904.data');
    }

    /**
     * @dataProvider providerIsDateTimeFormatCode
     */
    public function testIsDateTimeFormatCode(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'isDateTimeFormatCode'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerIsDateTimeFormatCode()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimeFormatCodes.data');
    }

    /**
     * @dataProvider providerDateTimeExcelToPHP1900Timezone
     */
    public function testDateTimeExcelToPHP1900Timezone(): void
    {
        $result = call_user_func(
            ['PHPExcel_Shared_Date', 'setExcelCalendar'],
            PHPExcel_Shared_Date::CALENDAR_WINDOWS_1900
        );

        $args = func_get_args();
        $expectedResult = array_pop($args);
        if ($args[0] < 1) {
            $expectedResult += gmmktime(0, 0, 0);
        }
        $result = call_user_func_array(['PHPExcel_Shared_Date', 'ExcelToPHP'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDateTimeExcelToPHP1900Timezone()
    {
        return new testDataFileIterator('rawTestData/Shared/DateTimeExcelToPHP1900Timezone.data');
    }
}
