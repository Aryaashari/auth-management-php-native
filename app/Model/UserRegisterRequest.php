<?php

namespace Login\Management\Model;

class UserRegisterRequest {

    private string $name, $username, $password, $confirmPassword;

    public function __construct(string $name, string $username, string $password, string $confirmPassword)
    {
        $this->name = $name;
        $this->username = $username;
        $this->password = $password;
        $this->confirmPassword = $confirmPassword;
    }


    // Getter
    public function getName() : string {
        return $this->name;
    }

    public function getUsername() : string {
        return $this->username;
    }


    public function getPassword() : string {
        return $this->password;
    }


    public function getConfirmPassword() : string {
        return $this->confirmPassword;
    }


}