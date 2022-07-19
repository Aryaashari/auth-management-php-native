<?php

namespace Login\Management\Entity;

class User {

    public function __construct(
        private int $id,
        private string $name,
        private string $username,
        private string $password,
        private \DateTime $createTime, 
        private \DateTime $updateTime 
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

    public function getPassword() : string {
        return $this->password;
    }

    public function getCreateTime() : \DateTime {
        return $this->createTime;
    }

    public function getUpdateTime() : \DateTime {
        return $this->updateTime;
    }


}