<?php

namespace Login\Management\Model;


class UserEditPasswordResponse {

    private int $id;
    private string $name, $username;

    public function __construct(int $id, string $name, string $username)
    {
        $this->id = $id;
        $this->name = $name;
        $this->username = $username;
    }


    // Getter
    public function getId() : int {
        return $this->id;
    }

    public function getName() : int {
        return $this->name;
    }

    public function getUsername() : int {
        return $this->username;
    }

}