<?php

namespace Login\Management\Controller;

use Login\Management\App\View;

class UserController {

    public function registerView()  : void{
        View::render("auth/register.php");
    }



    public function loginView()  : void{
        View::render("auth/login.php");
    }

}