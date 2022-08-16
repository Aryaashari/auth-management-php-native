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

    public function getOldPass() : string {
        return $this->oldPass;
    }

    public function getNewPass() : string {
        return $this->newPass;
    }

    public function getConfirmNewPass() : string {
        return $this->confirmNewPass;
    }

}