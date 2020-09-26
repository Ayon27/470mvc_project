<?php

class loginController
{
    private $name;
    private $email;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function checkEmail() {
        if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else return false;
    }
}
