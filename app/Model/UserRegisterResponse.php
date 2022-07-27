<?php

namespace Login\Management\Model;

class UserRegisterResponse {

    public function __construct(
        private int $id,
        private string $name,
        private string $username,
    ){}

    // Gettter
    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getUsername() : string {
        return $this->username;
    }


    // Setter
    // public function setId(int $id) : void {
    //     $this->id = $id;
    // }

    // public function setName(int $name) : void {
    //     $this->name = $name;
    // }

    // public function setUsername(int $username) : void {
    //     $this->username = $username;
    // }

}