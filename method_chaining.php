<?php
class User
{

    public function setName($name)
    {
        echo "Name: $name<br>";
        return $this;
    }

    public function setEmail($email)
    {
        echo "Email: $email<br>";
        return $this;
    }

    public function save()
    {
        echo "User Saved!";
        return $this;
    }
}

$user = new User();

$user->setName("Forid")
    ->setEmail("forid@gmail.com")
    ->save();
