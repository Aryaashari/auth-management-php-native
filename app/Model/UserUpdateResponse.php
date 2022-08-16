<?php

namespace Login\Management\Model;

class UserUpdateResponse {

    private int $id;
    private string $name, $username;

    public function __construct(int $id, string $name, string $username) 
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
    }

    
    // getter
    public function getId() : int {
        return $this->id;
    }

    public function getName() : string {
        return $this->name;
    }

    public function getUsername() : string {
        return $this->username;
    } 

}