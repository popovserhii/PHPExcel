<?php

require_once 'testDataFileIterator.php';

class FileTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testGetUseUploadTempDirectory(): void
    {
        $expectedResult = false;

        $result = call_user_func(['PHPExcel_Shared_File', 'getUseUploadTempDirectory']);
        self::assertEquals($expectedResult, $result);
    }

    public function testSetUseUploadTempDirectory(): void
    {
        $useUploadTempDirectoryValues = [
            true,
            false,
        ];

        foreach ($useUploadTempDirectoryValues as $useUploadTempDirectoryValue) {
            call_user_func(['PHPExcel_Shared_File', 'setUseUploadTempDirectory'], $useUploadTempDirectoryValue);

            $result = call_user_func(['PHPExcel_Shared_File', 'getUseUploadTempDirectory']);
            self::assertEquals($useUploadTempDirectoryValue, $result);
        }
    }
}
