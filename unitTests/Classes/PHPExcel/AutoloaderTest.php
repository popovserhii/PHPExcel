<?php

class AutoloaderTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testAutoloaderNonPHPExcelClass(): void
    {
        $className = 'InvalidClass';

        $result = PHPExcel_Autoloader::Load($className);
        //    Must return a boolean...
        self::assertIsBool($result);
        //    ... indicating failure
        self::assertFalse($result);
    }

    public function testAutoloaderInvalidPHPExcelClass(): void
    {
        $className = 'PHPExcel_Invalid_Class';

        $result = PHPExcel_Autoloader::Load($className);
        //    Must return a boolean...
        self::assertIsBool($result);
        //    ... indicating failure
        self::assertFalse($result);
    }

    public function testAutoloadValidPHPExcelClass(): void
    {
        $className = 'PHPExcel_IOFactory';

        $result = PHPExcel_Autoloader::Load($className);
        //    Check that class has been loaded
        self::assertTrue(class_exists($className));
    }

    public function testAutoloadInstantiateSuccess(): void
    {
        $result = new PHPExcel_Calculation_Function(1, 2, 3);
        //    Must return an object...
        self::assertIsObject($result);
        //    ... of the correct type
        self::assertTrue(is_a($result, 'PHPExcel_Calculation_Function'));
    }
}
