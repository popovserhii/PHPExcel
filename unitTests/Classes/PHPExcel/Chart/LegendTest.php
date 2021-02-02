<?php

class LegendTest extends PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    public function testSetPosition(): void
    {
        $positionValues = [
            PHPExcel_Chart_Legend::POSITION_RIGHT,
            PHPExcel_Chart_Legend::POSITION_LEFT,
            PHPExcel_Chart_Legend::POSITION_TOP,
            PHPExcel_Chart_Legend::POSITION_BOTTOM,
            PHPExcel_Chart_Legend::POSITION_TOPRIGHT,
        ];

        $testInstance = new PHPExcel_Chart_Legend();

        foreach ($positionValues as $positionValue) {
            $result = $testInstance->setPosition($positionValue);
            self::assertTrue($result);
        }
    }

    public function testSetInvalidPositionReturnsFalse(): void
    {
        $testInstance = new PHPExcel_Chart_Legend();

        $result = $testInstance->setPosition('BottomLeft');
        self::assertFalse($result);
        //    Ensure that value is unchanged
        $result = $testInstance->getPosition();
        self::assertEquals(PHPExcel_Chart_Legend::POSITION_RIGHT, $result);
    }

    public function testGetPosition(): void
    {
        $PositionValue = PHPExcel_Chart_Legend::POSITION_BOTTOM;

        $testInstance = new PHPExcel_Chart_Legend();
        $setValue = $testInstance->setPosition($PositionValue);

        $result = $testInstance->getPosition();
        self::assertEquals($PositionValue, $result);
    }

    public function testSetPositionXL(): void
    {
        $positionValues = [
            PHPExcel_Chart_Legend::xlLegendPositionBottom,
            PHPExcel_Chart_Legend::xlLegendPositionCorner,
            PHPExcel_Chart_Legend::xlLegendPositionCustom,
            PHPExcel_Chart_Legend::xlLegendPositionLeft,
            PHPExcel_Chart_Legend::xlLegendPositionRight,
            PHPExcel_Chart_Legend::xlLegendPositionTop,
        ];

        $testInstance = new PHPExcel_Chart_Legend();

        foreach ($positionValues as $positionValue) {
            $result = $testInstance->setPositionXL($positionValue);
            self::assertTrue($result);
        }
    }

    public function testSetInvalidXLPositionReturnsFalse(): void
    {
        $testInstance = new PHPExcel_Chart_Legend();

        $result = $testInstance->setPositionXL(999);
        self::assertFalse($result);
        //    Ensure that value is unchanged
        $result = $testInstance->getPositionXL();
        self::assertEquals(PHPExcel_Chart_Legend::xlLegendPositionRight, $result);
    }

    public function testGetPositionXL(): void
    {
        $PositionValue = PHPExcel_Chart_Legend::xlLegendPositionCorner;

        $testInstance = new PHPExcel_Chart_Legend();
        $setValue = $testInstance->setPositionXL($PositionValue);

        $result = $testInstance->getPositionXL();
        self::assertEquals($PositionValue, $result);
    }

    public function testSetOverlay(): void
    {
        $overlayValues = [
            true,
            false,
        ];

        $testInstance = new PHPExcel_Chart_Legend();

        foreach ($overlayValues as $overlayValue) {
            $result = $testInstance->setOverlay($overlayValue);
            self::assertTrue($result);
        }
    }

    public function testSetInvalidOverlayReturnsFalse(): void
    {
        $testInstance = new PHPExcel_Chart_Legend();

        $result = $testInstance->setOverlay('INVALID');
        self::assertFalse($result);

        $result = $testInstance->getOverlay();
        self::assertFalse($result);
    }

    public function testGetOverlay(): void
    {
        $OverlayValue = true;

        $testInstance = new PHPExcel_Chart_Legend();
        $setValue = $testInstance->setOverlay($OverlayValue);

        $result = $testInstance->getOverlay();
        self::assertEquals($OverlayValue, $result);
    }
}
