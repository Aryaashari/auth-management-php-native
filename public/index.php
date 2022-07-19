<?php
require_once __DIR__."/../vendor/autoload.php";

use Login\Management\App\Router;
use Login\Management\Controller\HomeController;

Router::add("GET", "/", HomeController::class, 'index');

Router::run();