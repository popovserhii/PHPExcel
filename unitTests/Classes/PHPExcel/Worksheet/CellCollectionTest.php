<?php

class CellCollectionTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testCacheLastCell(): void
    {
        $methods = PHPExcel_CachedObjectStorageFactory::getCacheStorageMethods();
        foreach ($methods as $method) {
            PHPExcel_CachedObjectStorageFactory::initialize($method);
            $workbook = new PHPExcel();
            $cells = ['A1', 'A2'];
            $worksheet = $workbook->getActiveSheet();
            $worksheet->setCellValue('A1', 1);
            $worksheet->setCellValue('A2', 2);
            self::assertEquals($cells, $worksheet->getCellCollection(), "Cache method \"$method\".");
            PHPExcel_CachedObjectStorageFactory::finalize();
        }
    }
}
