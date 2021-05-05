<?php

class RowCellIteratorTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockRowCell;

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
            ->method('getHighestColumn')
            ->willReturn('E');
        $this->mockWorksheet->expects(self::any())
            ->method('getCellByColumnAndRow')
            ->willReturn($this->mockCell);
    }

    public function testIteratorFullRange(): void
    {
        $iterator = new PHPExcel_Worksheet_RowCellIterator($this->mockWorksheet);
        $RowCellIndexResult = 'A';
        self::assertEquals($RowCellIndexResult, $iterator->key());

        foreach ($iterator as $key => $RowCell) {
            self::assertEquals($RowCellIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Cell', $RowCell);
        }
    }

    public function testIteratorStartEndRange(): void
    {
        $iterator = new PHPExcel_Worksheet_RowCellIterator($this->mockWorksheet, 2, 'B', 'D');
        $RowCellIndexResult = 'B';
        self::assertEquals($RowCellIndexResult, $iterator->key());

        foreach ($iterator as $key => $RowCell) {
            self::assertEquals($RowCellIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Cell', $RowCell);
        }
    }

    public function testIteratorSeekAndPrev(): void
    {
        $ranges = range('A', 'E');
        $iterator = new PHPExcel_Worksheet_RowCellIterator($this->mockWorksheet, 2, 'B', 'D');
        $RowCellIndexResult = 'D';
        $iterator->seek('D');
        self::assertEquals($RowCellIndexResult, $iterator->key());

        for ($i = 1; $i < array_search($RowCellIndexResult, $ranges); ++$i) {
            $iterator->prev();
            $expectedResult = $ranges[array_search($RowCellIndexResult, $ranges) - $i];
            self::assertEquals($expectedResult, $iterator->key());
        }
    }

    public function testSeekOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_RowCellIterator($this->mockWorksheet, 2, 'B', 'D');
        $iterator->seek(1);
    }

    public function testPrevOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_RowCellIterator($this->mockWorksheet, 2, 'B', 'D');
        $iterator->prev();
    }
}
