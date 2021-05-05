<?php

class HyperlinkTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testGetUrl(): void
    {
        $urlValue = 'http://www.phpexcel.net';

        $testInstance = new PHPExcel_Cell_Hyperlink($urlValue);

        $result = $testInstance->getUrl();
        self::assertEquals($urlValue, $result);
    }

    public function testSetUrl(): void
    {
        $initialUrlValue = 'http://www.phpexcel.net';
        $newUrlValue = 'http://github.com/PHPOffice/PHPExcel';

        $testInstance = new PHPExcel_Cell_Hyperlink($initialUrlValue);
        $result = $testInstance->setUrl($newUrlValue);
        self::assertTrue($result instanceof PHPExcel_Cell_Hyperlink);

        $result = $testInstance->getUrl();
        self::assertEquals($newUrlValue, $result);
    }

    public function testGetTooltip(): void
    {
        $tooltipValue = 'PHPExcel Web Site';

        $testInstance = new PHPExcel_Cell_Hyperlink(null, $tooltipValue);

        $result = $testInstance->getTooltip();
        self::assertEquals($tooltipValue, $result);
    }

    public function testSetTooltip(): void
    {
        $initialTooltipValue = 'PHPExcel Web Site';
        $newTooltipValue = 'PHPExcel Repository on Github';

        $testInstance = new PHPExcel_Cell_Hyperlink(null, $initialTooltipValue);
        $result = $testInstance->setTooltip($newTooltipValue);
        self::assertTrue($result instanceof PHPExcel_Cell_Hyperlink);

        $result = $testInstance->getTooltip();
        self::assertEquals($newTooltipValue, $result);
    }

    public function testIsInternal(): void
    {
        $initialUrlValue = 'http://www.phpexcel.net';
        $newUrlValue = 'sheet://Worksheet1!A1';

        $testInstance = new PHPExcel_Cell_Hyperlink($initialUrlValue);
        $result = $testInstance->isInternal();
        self::assertFalse($result);

        $testInstance->setUrl($newUrlValue);
        $result = $testInstance->isInternal();
        self::assertTrue($result);
    }

    public function testGetHashCode(): void
    {
        $urlValue = 'http://www.phpexcel.net';
        $tooltipValue = 'PHPExcel Web Site';
        $initialExpectedHash = 'd84d713aed1dbbc8a7c5af183d6c7dbb';

        $testInstance = new PHPExcel_Cell_Hyperlink($urlValue, $tooltipValue);

        $result = $testInstance->getHashCode();
        self::assertEquals($initialExpectedHash, $result);
    }
}
