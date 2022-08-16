<?php

namespace Login\Management\Model;


class UserEditPasswordRequest {

    private int $id;
    private string $oldPass, $newPass, $confirmNewPass;

    public function __construct(int $id, string $oldPass, string $newPass, string $confirmNewPass)
    {
        $this->id = $id;
        $this->oldPass = $oldPass;
        $this->newPass = $newPass;
        $this->confirmNewPass = $confirmNewPass;
    }


    // Getter
    public function getId() : int {
        return $this->id;
    }

    public function getOldPass() : int {
        return $this->oldPass;
    }

    public function getNewPass() : int {
        return $this->newPass;
    }

    public function getConfirmNewPass() : int {
        return $this->confirmNewPass;
    }

}