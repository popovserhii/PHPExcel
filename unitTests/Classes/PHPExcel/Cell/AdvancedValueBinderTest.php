<?php

class AdvancedValueBinderTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function provider()
    {
        if (!class_exists('PHPExcel_Style_NumberFormat')) {
            $this->setUp();
        }
        $currencyUSD = PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE;
        $currencyEURO = str_replace('$', '€', PHPExcel_Style_NumberFormat::FORMAT_CURRENCY_USD_SIMPLE);

        return [
            ['10%', 0.1, PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE_00, ',', '.', '$'],
            ['$10.11', 10.11, $currencyUSD, ',', '.', '$'],
            ['$1,010.12', 1010.12, $currencyUSD, ',', '.', '$'],
            ['$20,20', 20.2, $currencyUSD, '.', ',', '$'],
            ['$2.020,20', 2020.2, $currencyUSD, '.', ',', '$'],
            ['€2.020,20', 2020.2, $currencyEURO, '.', ',', '€'],
            ['€ 2.020,20', 2020.2, $currencyEURO, '.', ',', '€'],
            ['€2,020.22', 2020.22, $currencyEURO, ',', '.', '€'],
        ];
    }

    /**
     * @dataProvider provider
     *
     * @param mixed $value
     * @param mixed $valueBinded
     * @param mixed $format
     * @param mixed $thousandsSeparator
     * @param mixed $decimalSeparator
     * @param mixed $currencyCode
     */
    public function testCurrency($value, $valueBinded, $format, $thousandsSeparator, $decimalSeparator, $currencyCode): void
    {
        $sheet = $this->createPartialMock(
            'PHPExcel_Worksheet',
            ['getStyle', 'getNumberFormat', 'setFormatCode', 'getCellCacheController']
        );
        $cache = $this->getMockBuilder('PHPExcel_CachedObjectStorage_Memory')
            ->disableOriginalConstructor()
            ->getMock();
        $cache->expects(self::any())
            ->method('getParent')
            ->willReturn($sheet);

        $sheet->expects(self::once())
            ->method('getStyle')
            ->willReturnSelf();
        $sheet->expects(self::once())
            ->method('getNumberFormat')
            ->willReturnSelf();
        $sheet->expects(self::once())
            ->method('setFormatCode')
            ->with($format)
            ->willReturnSelf();
        $sheet->expects(self::any())
            ->method('getCellCacheController')
            ->willReturn($cache);

        PHPExcel_Shared_String::setCurrencyCode($currencyCode);
        PHPExcel_Shared_String::setDecimalSeparator($decimalSeparator);
        PHPExcel_Shared_String::setThousandsSeparator($thousandsSeparator);

        $cell = new PHPExcel_Cell(null, PHPExcel_Cell_DataType::TYPE_STRING, $sheet);

        $binder = new PHPExcel_Cell_AdvancedValueBinder();
        $binder->bindValue($cell, $value);
        self::assertEquals($valueBinded, $cell->getValue());
    }
}
