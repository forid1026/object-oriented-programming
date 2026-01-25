<?php

abstract class Vehicle
{
    abstract public function start();
    public function fuelType()
    {
        echo "Petrol or Diesel\n";
    }
}

class Car extends Vehicle
{
    public function start()
    {
        echo "Car started\n";
    }
}

class Bike extends Vehicle
{
    public function start()
    {
        echo "Bike started\n";
    }
}

$bike = new Bike;
$bike->start();
$bike->fuelType();

$car = new Car;
$car->start();
