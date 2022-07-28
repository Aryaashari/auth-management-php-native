<?php

namespace Login\Management\Controller;

use Login\Management\App\View;
use Login\Management\Config\Database;
use Login\Management\Exception\UserException;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Repository\UserRepository;
use Login\Management\Service\UserService;

class UserController {
    
    private UserRepository $userRepo;
    private UserService $userService;

    public function __construct()
    {
        $this->userRepo = new UserRepository(Database::getConnection());
        $this->userService = new UserService($this->userRepo);
    }

    public function registerView()  : void{
        View::render("auth/register.php");
    }

    public function register() {

        try {
            $name = htmlspecialchars(trim($_POST["name"]));
            $username = htmlspecialchars(trim($_POST["username"]));
            $password = htmlspecialchars(trim($_POST["password"]));
            $confirmPassword = htmlspecialchars(trim($_POST["confirmPassword"]));

            $request = new UserRegisterRequest($name, $username, $password, $confirmPassword);
            $this->userService->register($request);
            header("location: /login");
        } catch(UserException $e) {
            echo $e->getMessage();
            exit();
        }


    }



    public function loginView()  : void{
        View::render("auth/login.php");
    }

}