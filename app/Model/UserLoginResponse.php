<?php

namespace Login\Management\Model;

use Login\Management\Entity\User;

class UserLoginResponse {

    public function __construct(
        public User $user
    ){}

}