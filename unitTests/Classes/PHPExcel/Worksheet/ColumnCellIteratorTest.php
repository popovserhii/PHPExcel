<?php

class ColumnCellIteratorTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockColumnCell;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->mockCell = $this->getMockBuilder('PHPExcel_Cell')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet = $this->getMockBuilder('PHPExcel_Worksheet')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet->expects(self::any())
            ->method('getHighestRow')
            ->willReturn(5);
        $this->mockWorksheet->expects(self::any())
            ->method('getCellByColumnAndRow')
            ->willReturn($this->mockCell);
    }

    public function testIteratorFullRange(): void
    {
        $iterator = new PHPExcel_Worksheet_ColumnCellIterator($this->mockWorksheet, 'A');
        $ColumnCellIndexResult = 1;
        self::assertEquals($ColumnCellIndexResult, $iterator->key());

        foreach ($iterator as $key => $ColumnCell) {
            self::assertEquals($ColumnCellIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Cell', $ColumnCell);
        }
    }

    public function testIteratorStartEndRange(): void
    {
        $iterator = new PHPExcel_Worksheet_ColumnCellIterator($this->mockWorksheet, 'A', 2, 4);
        $ColumnCellIndexResult = 2;
        self::assertEquals($ColumnCellIndexResult, $iterator->key());

        foreach ($iterator as $key => $ColumnCell) {
            self::assertEquals($ColumnCellIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Cell', $ColumnCell);
        }
    }

    public function testIteratorSeekAndPrev(): void
    {
        $iterator = new PHPExcel_Worksheet_ColumnCellIterator($this->mockWorksheet, 'A', 2, 4);
        $columnIndexResult = 4;
        $iterator->seek(4);
        self::assertEquals($columnIndexResult, $iterator->key());

        for ($i = 1; $i < $columnIndexResult - 1; ++$i) {
            $iterator->prev();
            self::assertEquals($columnIndexResult - $i, $iterator->key());
        }
    }

    public function testSeekOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_ColumnCellIterator($this->mockWorksheet, 'A', 2, 4);
        $iterator->seek(1);
    }

    public function testPrevOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_ColumnCellIterator($this->mockWorksheet, 'A', 2, 4);
        $iterator->prev();
    }
}
