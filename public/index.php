<?php
require_once __DIR__."/../vendor/autoload.php";

use Login\Management\App\Router;
use Login\Management\Controller\HomeController;
use Login\Management\Controller\UserController;

Router::add("GET", "/", HomeController::class, 'index');

// User Controller
Router::add("GET", "/register", UserController::class, "registerView");
Router::add("GET", "/login", UserController::class, "loginView");

Router::run();