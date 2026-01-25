<?php

class Calculator
{
    private $total = 0;

    public function sum(array $numbers): void
    {

        foreach ($numbers as $number) {
            $this->total += $number;
        }
    }

    public function total(): float
    {
        return $this->total;
    }
}

$sum = new Calculator();
$sum->sum([10, 15, 20, 25, 30]);
echo $sum->total();
