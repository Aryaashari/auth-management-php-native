<?php
require_once __DIR__."/../vendor/autoload.php";

use Login\Management\App\Router;
use Login\Management\Config\Database;
use Login\Management\Controller\HomeController;
use Login\Management\Controller\UserController;
use Login\Management\Middleware\AuthMiddleware;
use Login\Management\Helper\Auth;

Database::getConnection("production");
Router::add("GET", "/", HomeController::class, 'index', [AuthMiddleware::class]);

// User Controller
Router::add("GET", "/register", UserController::class, "registerView", [AuthMiddleware::class]);
Router::add("POST", "/register", UserController::class, "register", [AuthMiddleware::class]);

Router::add("GET", "/login", UserController::class, "loginView", [AuthMiddleware::class]);
Router::add("POST", "/login", UserController::class, "login", [AuthMiddleware::class]);

Router::add("POST", "/logout", UserController::class, "logout", [AuthMiddleware::class]);

Router::run();