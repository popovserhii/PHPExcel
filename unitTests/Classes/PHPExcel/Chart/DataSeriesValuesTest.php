<?php

class DataSeriesValuesTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testSetDataType(): void
    {
        $dataTypeValues = [
            'Number',
            'String'
        ];

        $testInstance = new PHPExcel_Chart_DataSeriesValues();

        foreach ($dataTypeValues as $dataTypeValue) {
            $result = $testInstance->setDataType($dataTypeValue);
            self::assertTrue($result instanceof PHPExcel_Chart_DataSeriesValues);
        }
    }

    public function testSetInvalidDataTypeThrowsException(): void
    {
        $testInstance = new PHPExcel_Chart_DataSeriesValues();

        try {
            $result = $testInstance->setDataType('BOOLEAN');
        } catch (Exception $e) {
            self::assertEquals($e->getMessage(), 'Invalid datatype for chart data series values');

            return;
        }
        self::fail('An expected exception has not been raised.');
    }

    public function testGetDataType(): void
    {
        $dataTypeValue = 'String';

        $testInstance = new PHPExcel_Chart_DataSeriesValues();
        $setValue = $testInstance->setDataType($dataTypeValue);

        $result = $testInstance->getDataType();
        self::assertEquals($dataTypeValue, $result);
    }
}
