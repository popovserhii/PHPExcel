<?php

require_once 'testDataFileIterator.php';

class PasswordHasherTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    /**
     * @dataProvider providerHashPassword
     */
    public function testHashPassword(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Shared_PasswordHasher', 'hashPassword'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerHashPassword()
    {
        return new testDataFileIterator('rawTestData/Shared/PasswordHashes.data');
    }
}
