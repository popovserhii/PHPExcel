<?php

class DataTypeTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testGetErrorCodes(): void
    {
        $result = call_user_func(['PHPExcel_Cell_DataType', 'getErrorCodes']);
        self::assertIsArray($result);
        self::assertGreaterThan(0, count($result));
        self::assertArrayHasKey('#NULL!', $result);
    }
}
