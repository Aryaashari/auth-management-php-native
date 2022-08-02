<?php

namespace Login\Management\Service;

use Login\Management\Entity\User;
use Login\Management\Exception\UserException;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Model\UserRegisterResponse;
use Login\Management\Model\UserLoginRequest;
use Login\Management\Model\UserLoginResponse;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;
use Login\Management\Validation\UserServiceValidation;

class UserService {

    private UserRepository $repo;
    private SessionService $sesService;

    public function __construct(UserRepository $repo, SessionRepository $sesRepo) 
    {
        $this->repo = $repo;
        $this->sesService = new SessionService($sesRepo);
    }

    public function register(UserRegisterRequest $request) : UserRegisterResponse {

        try {
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
        } catch(UserException $e) {
            throw $e;
        }


    }


    public function login(UserLoginRequest $request) : UserLoginResponse {

        try {

            $user = UserServiceValidation::LoginValidation($request, $this->repo);
            
            $response = new UserLoginResponse($user);

            $session = $this->sesService->create($user->getId(), $request->getIsRemember());

            return $response;
        } catch(UserException $e) {
            throw $e;
        }

    }

}