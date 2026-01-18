<?php

interface Animal
{
    public function makeSound();
}

class Dog implements Animal
{
    public function makeSound()
    {
        echo "Woof!\n";
    }
}

class Cat implements Animal
{
    public function makeSound()
    {
        echo "Meow!\n";
    }
}

// $dog = new Dog;
// $cat = new Cat;
// echo $dog->makeSound();
// echo "<br>";
// echo $cat->makeSound();

// payment gateway interface
interface PaymentGateway
{
    public function pay($amount);
}

class StripePayment implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount via Stripe\n";
    }
}

class PayPalPayment implements PaymentGateway
{
    public function pay($amount)
    {
        echo "Paid $amount via PayPal\n";
    }
}

$stripePayment = new StripePayment();
$stripePayment->pay(500);

$paypalPayment = new PayPalPayment();
$paypalPayment->pay(500);
