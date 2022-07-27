<?php

namespace Login\Management\Service;

use Login\Management\Entity\User;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Model\UserRegisterResponse;
use Login\Management\Repository\UserRepository;
use Login\Management\Validation\UserServiceValidation;

class UserService {

    private UserRepository $repo;

    public function __construct(UserRepository $repo) 
    {
        $this->repo = $repo;
    }

    public function register(UserRegisterRequest $request) : UserRegisterResponse {

        UserServiceValidation::RegisterValidation($request, $this->repo);

        $user = new User(
            null,
            $request->getName(),
            $request->getUsername(),
            password_hash($request->getPassword(), PASSWORD_BCRYPT)
        );

        $user = $this->repo->save($user);

        $response = new UserRegisterResponse($user->getId(), $user->getName(), $user->getUsername());
        return $response;

    }

}