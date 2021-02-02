<?php

require_once 'testDataFileIterator.php';

class StringTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testGetIsMbStringEnabled(): void
    {
        $result = call_user_func(['PHPExcel_Shared_String', 'getIsMbstringEnabled']);
        self::assertTrue($result);
    }

    public function testGetIsIconvEnabled(): void
    {
        $result = call_user_func(['PHPExcel_Shared_String', 'getIsIconvEnabled']);
        self::assertTrue($result);
    }

    public function testGetDecimalSeparator(): void
    {
        $localeconv = localeconv();

        $expectedResult = (!empty($localeconv['decimal_point'])) ? $localeconv['decimal_point'] : ',';
        $result = call_user_func(['PHPExcel_Shared_String', 'getDecimalSeparator']);
        self::assertEquals($expectedResult, $result);
    }

    public function testSetDecimalSeparator(): void
    {
        $expectedResult = ',';
        $result = call_user_func(['PHPExcel_Shared_String', 'setDecimalSeparator'], $expectedResult);

        $result = call_user_func(['PHPExcel_Shared_String', 'getDecimalSeparator']);
        self::assertEquals($expectedResult, $result);
    }

    public function testGetThousandsSeparator(): void
    {
        $localeconv = localeconv();

        $expectedResult = (!empty($localeconv['thousands_sep'])) ? $localeconv['thousands_sep'] : ',';
        $result = call_user_func(['PHPExcel_Shared_String', 'getThousandsSeparator']);
        self::assertEquals($expectedResult, $result);
    }

    public function testSetThousandsSeparator(): void
    {
        $expectedResult = ' ';
        $result = call_user_func(['PHPExcel_Shared_String', 'setThousandsSeparator'], $expectedResult);

        $result = call_user_func(['PHPExcel_Shared_String', 'getThousandsSeparator']);
        self::assertEquals($expectedResult, $result);
    }

    public function testGetCurrencyCode(): void
    {
        $localeconv = localeconv();

        $expectedResult = (!empty($localeconv['currency_symbol'])) ? $localeconv['currency_symbol'] : '$';
        $result = call_user_func(['PHPExcel_Shared_String', 'getCurrencyCode']);
        self::assertEquals($expectedResult, $result);
    }

    public function testSetCurrencyCode(): void
    {
        $expectedResult = '£';
        $result = call_user_func(['PHPExcel_Shared_String', 'setCurrencyCode'], $expectedResult);

        $result = call_user_func(['PHPExcel_Shared_String', 'getCurrencyCode']);
        self::assertEquals($expectedResult, $result);
    }
}
