<?php

class ColumnIteratorTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockColumn;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->mockColumn = $this->getMockBuilder('PHPExcel_Worksheet_Column')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet = $this->getMockBuilder('PHPExcel_Worksheet')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet->expects(self::any())
            ->method('getHighestColumn')
            ->willReturn('E');
        $this->mockWorksheet->expects(self::any())
            ->method('current')
            ->willReturn($this->mockColumn);
    }

    public function testIteratorFullRange(): void
    {
        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet);
        $columnIndexResult = 'A';
        self::assertEquals($columnIndexResult, $iterator->key());

        foreach ($iterator as $key => $column) {
            self::assertEquals($columnIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Worksheet_Column', $column);
        }
    }

    public function testIteratorStartEndRange(): void
    {
        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet, 'B', 'D');
        $columnIndexResult = 'B';
        self::assertEquals($columnIndexResult, $iterator->key());

        foreach ($iterator as $key => $column) {
            self::assertEquals($columnIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Worksheet_Column', $column);
        }
    }

    public function testIteratorSeekAndPrev(): void
    {
        $ranges = range('A', 'E');
        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet, 'B', 'D');
        $columnIndexResult = 'D';
        $iterator->seek('D');
        self::assertEquals($columnIndexResult, $iterator->key());

        for ($i = 1; $i < array_search($columnIndexResult, $ranges); ++$i) {
            $iterator->prev();
            $expectedResult = $ranges[array_search($columnIndexResult, $ranges) - $i];
            self::assertEquals($expectedResult, $iterator->key());
        }
    }

    public function testStartOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet, 'IA', 'IV');
    }

    public function testSeekOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet, 'B', 'D');
        $iterator->seek('A');
    }

    public function testPrevOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_ColumnIterator($this->mockWorksheet, 'B', 'D');
        $iterator->prev();
    }
}
