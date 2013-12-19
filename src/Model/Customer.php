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

    /**
     * @return \Model\Email
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }
} 