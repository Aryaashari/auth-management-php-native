<?php 

namespace Login\Management\Entity;

class Session {

    public function __construct(
        private int $id,
        private int $user_id
    ){}


    // getter
    public function getId() : int {
        return $this->id;
    }

    public function getUserId() : int {
        return $this->user_id;
    }


    // Setter
    // public function setId(int $id) : void {
    //     $this->id = $id;
    // }

    // public function setUserId(int $id) : void {
    //     $this->user_id = $id;
    // }
}