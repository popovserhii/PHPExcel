<?php

class WorksheetRowTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockRow;

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
            ->method('getHighestColumn')
            ->willReturn('E');
    }

    public function testInstantiateRowDefault(): void
    {
        $row = new PHPExcel_Worksheet_Row($this->mockWorksheet);
        self::assertInstanceOf('PHPExcel_Worksheet_Row', $row);
        $rowIndex = $row->getRowIndex();
        self::assertEquals(1, $rowIndex);
    }

    public function testInstantiateRowSpecified(): void
    {
        $row = new PHPExcel_Worksheet_Row($this->mockWorksheet, 5);
        self::assertInstanceOf('PHPExcel_Worksheet_Row', $row);
        $rowIndex = $row->getRowIndex();
        self::assertEquals(5, $rowIndex);
    }

    public function testGetCellIterator(): void
    {
        $row = new PHPExcel_Worksheet_Row($this->mockWorksheet);
        $cellIterator = $row->getCellIterator();
        self::assertInstanceOf('PHPExcel_Worksheet_RowCellIterator', $cellIterator);
    }
}
