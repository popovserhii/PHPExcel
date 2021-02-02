<?php

require_once 'testDataFileIterator.php';

class NumberFormatDateTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        PHPExcel_Shared_String::setDecimalSeparator('.');
        PHPExcel_Shared_String::setThousandsSeparator(',');
    }

    /**
     * @dataProvider providerNumberFormat
     */
    public function testFormatValueWithMask(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Style_NumberFormat', 'toFormattedString'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerNumberFormat()
    {
        return new testDataFileIterator('rawTestData/Style/NumberFormatDates.data');
    }
}
