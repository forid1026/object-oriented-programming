<?php

class BankAccount
{
    private $balance = 0;

    public function deposit($amount)
    {
        $this->balance += $amount;
    }

    public function withdraw($amount)
    {
        if ($amount > 0 && $amount <= $this->balance) {
            $this->balance -= $amount;
        }
    }

    public function getBalance()
    {
        return $this->balance;
    }
}

$bankBalance = new BankAccount;
$bankBalance->deposit(15000);
$bankBalance->withdraw(5000);

echo $bankBalance->getBalance();
