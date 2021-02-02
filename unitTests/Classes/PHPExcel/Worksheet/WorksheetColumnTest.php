<?php

class WorksheetColumnTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockColumn;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->mockWorksheet = $this->getMockBuilder('PHPExcel_Worksheet')
            ->disableOriginalConstructor()
            ->getMock();
        $this->mockWorksheet->expects(self::any())
            ->method('getHighestRow')
            ->willReturn(5);
    }

    public function testInstantiateColumnDefault(): void
    {
        $column = new PHPExcel_Worksheet_Column($this->mockWorksheet);
        self::assertInstanceOf('PHPExcel_Worksheet_Column', $column);
        $columnIndex = $column->getColumnIndex();
        self::assertEquals('A', $columnIndex);
    }

    public function testInstantiateColumnSpecified(): void
    {
        $column = new PHPExcel_Worksheet_Column($this->mockWorksheet, 'E');
        self::assertInstanceOf('PHPExcel_Worksheet_Column', $column);
        $columnIndex = $column->getColumnIndex();
        self::assertEquals('E', $columnIndex);
    }

    public function testGetCellIterator(): void
    {
        $column = new PHPExcel_Worksheet_Column($this->mockWorksheet);
        $cellIterator = $column->getCellIterator();
        self::assertInstanceOf('PHPExcel_Worksheet_ColumnCellIterator', $cellIterator);
    }
}
