<?php
require_once __DIR__."/../vendor/autoload.php";

use Login\Management\App\Router;
use Login\Management\Config\Database;
use Login\Management\Controller\HomeController;
use Login\Management\Controller\UserController;


Database::getConnection("production");
Router::add("GET", "/", HomeController::class, 'index');

// User Controller
Router::add("GET", "/register", UserController::class, "registerView");
Router::add("POST", "/register", UserController::class, "register");

Router::add("GET", "/login", UserController::class, "loginView");
Router::add("POST", "/login", UserController::class, "login");

Router::run();