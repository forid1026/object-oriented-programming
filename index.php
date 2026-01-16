<?php
// create a class
class User
{
    // properties
    public $name = 'John Doe';

    // methods
    public function fullName()
    {
        return 'Sheikh Farid';
    }
}

// create an object
$user = new User();
var_dump($user->name);
var_dump($user->fullName());
