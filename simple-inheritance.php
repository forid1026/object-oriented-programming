<?php

class Person
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

class Child extends Person
{
    private string $childName;

    public function __construct(string $fatherName, string $childName)
    {
        parent::__construct($fatherName); // parent class constructor call
        $this->childName = $childName;
    }

    public function showMessage(): string
    {
        return "Hello, this is {$this->childName}. Son of {$this->getName()}";
    }
}

// ========== TEST ==========

$child = new Child('Gomir Uddin', 'Farid');

echo $child->showMessage();
