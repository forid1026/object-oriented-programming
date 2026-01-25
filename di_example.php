<?php

class MailService
{
    public function send()
    {
        return "Mail Sent!";
    }
}

class UserController
{

    protected $mail;

    // Dependency Inject via Constructor
    public function __construct(MailService $mail)
    {
        $this->mail = $mail;
    }

    public function store()
    {
        echo $this->mail->send();
    }
}

// Object create
$mailService = new MailService();
$controller  = new UserController($mailService);

$controller->store();
