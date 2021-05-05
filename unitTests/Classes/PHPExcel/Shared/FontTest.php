<?php

require_once 'testDataFileIterator.php';

class FontTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testGetAutoSizeMethod(): void
    {
        $expectedResult = PHPExcel_Shared_Font::AUTOSIZE_METHOD_APPROX;

        $result = call_user_func(['PHPExcel_Shared_Font', 'getAutoSizeMethod']);
        self::assertEquals($expectedResult, $result);
    }

    public function testSetAutoSizeMethod(): void
    {
        $autosizeMethodValues = [
            PHPExcel_Shared_Font::AUTOSIZE_METHOD_EXACT,
            PHPExcel_Shared_Font::AUTOSIZE_METHOD_APPROX,
        ];

        foreach ($autosizeMethodValues as $autosizeMethodValue) {
            $result = call_user_func(['PHPExcel_Shared_Font', 'setAutoSizeMethod'], $autosizeMethodValue);
            self::assertTrue($result);
        }
    }

    public function testSetAutoSizeMethodWithInvalidValue(): void
    {
        $unsupportedAutosizeMethod = 'guess';

        $result = call_user_func(['PHPExcel_Shared_Font', 'setAutoSizeMethod'], $unsupportedAutosizeMethod);
        self::assertFalse($result);
    }

    /**
     * @dataProvider providerFontSizeToPixels
     */
    public function testFontSizeToPixels(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Font', 'fontSizeToPixels'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerFontSizeToPixels()
    {
        return new testDataFileIterator('rawTestData/Shared/FontSizeToPixels.data');
    }

    /**
     * @dataProvider providerInchSizeToPixels
     */
    public function testInchSizeToPixels(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Font', 'inchSizeToPixels'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerInchSizeToPixels()
    {
        return new testDataFileIterator('rawTestData/Shared/InchSizeToPixels.data');
    }

    /**
     * @dataProvider providerCentimeterSizeToPixels
     */
    public function testCentimeterSizeToPixels(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_Font', 'centimeterSizeToPixels'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerCentimeterSizeToPixels()
    {
        return new testDataFileIterator('rawTestData/Shared/CentimeterSizeToPixels.data');
    }
}
