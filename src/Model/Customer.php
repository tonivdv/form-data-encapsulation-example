<?php

namespace Model;

class Customer
{
    private $name;

    /**
     * @var Email
     */
    private $email;

    public function __construct($name, Email $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
} 