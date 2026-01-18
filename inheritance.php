<?php

class Model
{
    protected $dates = ['created_at', 'updated_at'];

    public function __get($property)
    {
        // property check
        if (! property_exists($this, $property)) {
            return null;
        }

        // if date field then convert to DateTime
        if (in_array($property, $this->dates)) {
            return new DateTime($this->$property);
        }

        // if normal property then return
        return $this->$property;
    }
}

class User extends Model
{
    protected $dates = ['created_at', 'updated_at'];

    protected $created_at;
    protected $updated_at;

    public function __construct()
    {
        $this->created_at = date('Y-m-d H:i:s');
        $this->updated_at = date('Y-m-d H:i:s');
    }
}

class Comment extends Model
{
    protected $created_at = '2025-01-01 10:30:00';
}

// ========== TEST ==========

$user = new User;

var_dump($user);
