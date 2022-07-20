<?php

namespace Login\Management\Service;

use Login\Management\Repository\UserRepository;

class UserService {

    private UserRepository $repo;

    public function __construct(UserRepository $repo) 
    {
        $this->repo = $repo;
    }


    public function register() {}

}