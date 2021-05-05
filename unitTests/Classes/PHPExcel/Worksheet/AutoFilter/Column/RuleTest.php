<?php

class RuleTest extends PHPUnit\Framework\TestCase
{
    private $_testAutoFilterRuleObject;

    private $_mockAutoFilterColumnObject;

    protected function setUp(): void
    {
        if (!defined('PHPEXCEL_ROOT')) {
            define('PHPEXCEL_ROOT', APPLICATION_PATH . '/');
        }
        require_once PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php';

        $this->_mockAutoFilterColumnObject = $this->getMockBuilder('PHPExcel_Worksheet_AutoFilter_Column')
            ->disableOriginalConstructor()
            ->getMock();

        $this->_mockAutoFilterColumnObject->expects(self::any())
            ->method('testColumnInRange')
            ->willReturn(3);

        $this->_testAutoFilterRuleObject = new PHPExcel_Worksheet_AutoFilter_Column_Rule(
            $this->_mockAutoFilterColumnObject
        );
    }

    public function testGetRuleType(): void
    {
        $result = $this->_testAutoFilterRuleObject->getRuleType();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_FILTER, $result);
    }

    public function testSetRuleType(): void
    {
        $expectedResult = PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP;

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterRuleObject->setRuleType($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);

        $result = $this->_testAutoFilterRuleObject->getRuleType();
        self::assertEquals($expectedResult, $result);
    }

    public function testSetValue(): void
    {
        $expectedResult = 100;

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterRuleObject->setValue($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);

        $result = $this->_testAutoFilterRuleObject->getValue();
        self::assertEquals($expectedResult, $result);
    }

    public function testGetOperator(): void
    {
        $result = $this->_testAutoFilterRuleObject->getOperator();
        self::assertEquals(PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_EQUAL, $result);
    }

    public function testSetOperator(): void
    {
        $expectedResult = PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_COLUMN_RULE_LESSTHAN;

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterRuleObject->setOperator($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);

        $result = $this->_testAutoFilterRuleObject->getOperator();
        self::assertEquals($expectedResult, $result);
    }

    public function testSetGrouping(): void
    {
        $expectedResult = PHPExcel_Worksheet_AutoFilter_Column_Rule::AUTOFILTER_RULETYPE_DATEGROUP_MONTH;

        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterRuleObject->setGrouping($expectedResult);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);

        $result = $this->_testAutoFilterRuleObject->getGrouping();
        self::assertEquals($expectedResult, $result);
    }

    public function testGetParent(): void
    {
        $result = $this->_testAutoFilterRuleObject->getParent();
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column', $result);
    }

    public function testSetParent(): void
    {
        //    Setters return the instance to implement the fluent interface
        $result = $this->_testAutoFilterRuleObject->setParent($this->_mockAutoFilterColumnObject);
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);
    }

    public function testClone(): void
    {
        $result = clone $this->_testAutoFilterRuleObject;
        self::assertInstanceOf('PHPExcel_Worksheet_AutoFilter_Column_Rule', $result);
    }
}
