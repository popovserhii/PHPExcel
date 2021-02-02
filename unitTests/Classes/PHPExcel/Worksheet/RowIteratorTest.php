<?php

class RowIteratorTest extends PHPUnit\Framework\TestCase
{
    public $mockWorksheet;

    public $mockRow;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->mockRow = $this->getMockBuilder('PHPExcel_Worksheet_Row')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet = $this->getMockBuilder('PHPExcel_Worksheet')
            ->disableOriginalConstructor()
            ->getMock();

        $this->mockWorksheet->expects(self::any())
            ->method('getHighestRow')
            ->willReturn(5);
        $this->mockWorksheet->expects(self::any())
            ->method('current')
            ->willReturn($this->mockRow);
    }

    public function testIteratorFullRange(): void
    {
        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet);
        $rowIndexResult = 1;
        self::assertEquals($rowIndexResult, $iterator->key());

        foreach ($iterator as $key => $row) {
            self::assertEquals($rowIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Worksheet_Row', $row);
        }
    }

    public function testIteratorStartEndRange(): void
    {
        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet, 2, 4);
        $rowIndexResult = 2;
        self::assertEquals($rowIndexResult, $iterator->key());

        foreach ($iterator as $key => $row) {
            self::assertEquals($rowIndexResult++, $key);
            self::assertInstanceOf('PHPExcel_Worksheet_Row', $row);
        }
    }

    public function testIteratorSeekAndPrev(): void
    {
        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet, 2, 4);
        $rowIndexResult = 4;
        $iterator->seek($rowIndexResult);
        self::assertEquals($rowIndexResult, $iterator->key());

        for ($i = 1; $i < $rowIndexResult - 1; ++$i) {
            $iterator->prev();
            self::assertEquals($rowIndexResult - $i, $iterator->key());
        }
    }

    public function testStartOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet, 256, 512);
    }

    public function testSeekOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet, 2, 4);
        $iterator->seek(1);
    }

    public function testPrevOutOfRange(): void
    {
        $this->expectException(\PHPExcel_Exception::class);

        $iterator = new PHPExcel_Worksheet_RowIterator($this->mockWorksheet, 2, 4);
        $iterator->prev();
    }
}
