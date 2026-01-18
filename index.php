<?php

class User
{
    public $name;
    public $email;
    public function introduce()
    {
        return "Hi, I am {$this->name} and my email is {$this->email}";
    }
}

$user        = new User;
$user->name  = "Sheikh Farid";
$user->email = "foridsheek@gmail.com";

echo $user->introduce();
