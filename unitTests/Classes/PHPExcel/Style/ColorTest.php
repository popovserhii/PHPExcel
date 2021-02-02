<?php

require_once 'testDataFileIterator.php';

class ColorTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    /**
     * @dataProvider providerColorGetRed
     */
    public function testGetRed(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Style_Color', 'getRed'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColorGetRed()
    {
        return new testDataFileIterator('rawTestData/Style/ColorGetRed.data');
    }

    /**
     * @dataProvider providerColorGetGreen
     */
    public function testGetGreen(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Style_Color', 'getGreen'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColorGetGreen()
    {
        return new testDataFileIterator('rawTestData/Style/ColorGetGreen.data');
    }

    /**
     * @dataProvider providerColorGetBlue
     */
    public function testGetBlue(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Style_Color', 'getBlue'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColorGetBlue()
    {
        return new testDataFileIterator('rawTestData/Style/ColorGetBlue.data');
    }

    /**
     * @dataProvider providerColorChangeBrightness
     */
    public function testChangeBrightness(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Style_Color', 'changeBrightness'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerColorChangeBrightness()
    {
        return new testDataFileIterator('rawTestData/Style/ColorChangeBrightness.data');
    }
}
