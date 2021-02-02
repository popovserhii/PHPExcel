<?php

require_once 'testDataFileIterator.php';

class DefaultValueBinderTest extends PHPUnit\Framework\TestCase
{
    protected $cellStub;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';
    }

    protected function createCellStub(): void
    {
        // Create a stub for the Cell class.
        $this->cellStub = $this->getMockBuilder('PHPExcel_Cell')
            ->disableOriginalConstructor()
            ->getMock();
        // Configure the stub.
        $this->cellStub->expects(self::any())
            ->method('setValueExplicit')
            ->willReturn(true);
    }

    /**
     * @dataProvider binderProvider
     *
     * @param mixed $value
     */
    public function testBindValue($value): void
    {
        $this->createCellStub();
        $binder = new PHPExcel_Cell_DefaultValueBinder();
        $result = $binder->bindValue($this->cellStub, $value);
        self::assertTrue($result);
    }

    public function binderProvider()
    {
        return [
            [null],
            [''],
            ['ABC'],
            ['=SUM(A1:B2)'],
            [true],
            [false],
            [123],
            [-123.456],
            ['123'],
            ['-123.456'],
            ['#REF!'],
            [new DateTime()],
        ];
    }

    /**
     * @dataProvider providerDataTypeForValue
     */
    public function testDataTypeForValue(): void
    {
        $args = func_get_args();
        $expectedResult = array_pop($args);
        $result = call_user_func_array(['PHPExcel_Cell_DefaultValueBinder', 'dataTypeForValue'], $args);
        self::assertEquals($expectedResult, $result);
    }

    public function providerDataTypeForValue()
    {
        return new testDataFileIterator('rawTestData/Cell/DefaultValueBinder.data');
    }

    public function testDataTypeForRichTextObject(): void
    {
        $objRichText = new PHPExcel_RichText();
        $objRichText->createText('Hello World');

        $expectedResult = PHPExcel_Cell_DataType::TYPE_INLINE;
        $result = call_user_func(['PHPExcel_Cell_DefaultValueBinder', 'dataTypeForValue'], $objRichText);
        self::assertEquals($expectedResult, $result);
    }
}
