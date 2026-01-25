<?php

class Calculator
{
    protected $result = 0;

    public function __construct($initialValue = 0)
    {
        $this->result = $initialValue;
    }

    public function add($value)
    {
        $this->result += $value;
    }

    public function subtract($value)
    {
        $this->result -= $value;
    }

    public function multiply($value)
    {
        $this->result *= $value;
    }

    public function divide($value)
    {
        $this->result /= $value;
    }

    public function getResult()
    {
        return $this->result;
    }

}

$calculator = new Calculator(10);
$calculator->add(5);
$calculator->subtract(3);
$calculator->multiply(2);
$calculator->divide(2);
echo $calculator->getResult();
