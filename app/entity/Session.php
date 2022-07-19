<?php 

namespace Login\Management\Entity;

class Session {

    public function __construct(
        private int $id,
        private int $user_id,
        private string $session_key,
    ){}


    // getter
    public function getId() : int {
        return $this->id;
    }

    public function getUserId() : int {
        return $this->user_id;
    }

    public function getSessionKey() : string {
        return $this->session_key;
    }
}