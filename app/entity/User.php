<?php

namespace Login\Management\Entity;

class User {

    public function __construct(
        private ?int $id = null,
        private string $name,
        private string $username,
        private string $password,
        private ?string $createTime = null, 
        private ?string $updateTime = null 
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

    public function getCreateTime() : string {
        return $this->createTime;
    }

    public function getUpdateTime() : string {
        return $this->updateTime;
    }


    // Setter
    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function setPassword(string $password) : void {
        $this->password = $password;
    }

    public function setCreateTime(string $dateTime) : void {
        $this->createTime = $dateTime;
    }

    public function setUpdateTime(string $dateTime) : void {
        $this->updateTime = $dateTime;
    }


}