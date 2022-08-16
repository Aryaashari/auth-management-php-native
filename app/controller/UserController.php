<?php

namespace Login\Management\Controller;

use Login\Management\App\View;
use Login\Management\Config\Database;
use Login\Management\Exception\UserException;
use Login\Management\Model\UserLoginRequest;
use Login\Management\Model\UserRegisterRequest;
use Login\Management\Model\UserUpdateRequest;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;
use Login\Management\Service\SessionService;
use Login\Management\Service\UserService;

class UserController {
    
    private UserRepository $userRepo;
    private UserService $userService;
    private SessionService $sesService;

    public function __construct()
    {
        $sesRepo = new SessionRepository(Database::getConnection());
        $this->userRepo = new UserRepository(Database::getConnection());
        $this->userService = new UserService($this->userRepo, $sesRepo);
        $this->sesService = new SessionService($sesRepo, $this->userRepo);
    }

    public function registerView()  : void{
        View::render("auth/register.php");
    }

    public function register() {

        $name = htmlspecialchars(trim($_POST["name"]));
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $confirmPassword = htmlspecialchars(trim($_POST["confirmPassword"]));
        $request = new UserRegisterRequest($name, $username, $password, $confirmPassword);
        try {
            $response = $this->userService->register($request);
            View::render("auth/register.php", [
                "success" => true,
                "user" => $response
            ]);
        } catch(UserException $e) {
            $errMessage = $e->getMessage();
            View::render("auth/register.php", [
                "error" => $errMessage
            ]);
        }


    }



    public function loginView()  : void{
        View::render("auth/login.php");
    }

    public function login() : void {

        $username = htmlspecialchars(trim($_POST["username"]));
        $password = htmlspecialchars(trim($_POST["password"]));
        $isRemember = (isset($_POST["isRemember"])) ? true : false;
        $request = new UserLoginRequest($username, $password, $isRemember);

        try {
            $response = $this->userService->login($request);
            // header("location: /");
            View::render("home.php", [
                "success" => "Selamat, anda berhasil login!"
            ]);
        } catch(UserException $e) {
            View::render("auth/login.php", [
                "error" => $e->getMessage()
            ]);
        }

    }

    public function logout() : void {

        $this->sesService->destroy();
        header("location: /login");

    }


    public function updateProfileView() :void {
        $user = $this->sesService->current();
        View::render("/user/edit-profile.php", [
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "username" => $user->getUsername()
            ]
        ]);
    }

    public function updateProfile() : void {

        $id = htmlspecialchars($_POST["id"]);
        $name = htmlspecialchars($_POST["name"]);
        $username = htmlspecialchars($_POST["username"]);

        $request = new UserUpdateRequest($id, $name, $username);

    }

}