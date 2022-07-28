<?php

namespace Login\Management\Model;


class UserLoginRequest {

    public function __construct(
        private string $username,
        private string $password,
        private bool $isRemember = false
    ){}


    // Getter
    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getIsRemember() {
        return $this->isRemember;
    }

}