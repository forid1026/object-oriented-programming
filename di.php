<?php

class Logger
{
    public function log($message)
    {
        echo $message;
    }
}

class User
{
    protected $logger;
    public function __construct(Logger $logger = null)
    {
        $this->logger = new Logger();
    }

    public function createUser($name)
    {
        $this->logger->log("User {$name} created");
    }

    public function DeleteUser($name)
    {
        $this->logger->log("User {$name} deleted");
    }
}

$logger = new Logger();
$user   = new User(logger: $logger);
// $user->createUser("Forid");
$user->DeleteUser("Forid");
