<?php 

namespace Login\Management\Controller;

use Login\Management\App\View;
use Login\Management\Config\Database;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;
use Login\Management\Service\SessionService;

class HomeController {

    private SessionService $sesService;

    public function __construct() {
        $userRepo = new UserRepository(Database::getConnection());
        $sesRepo = new SessionRepository(Database::getConnection());
        $this->sesService = new SessionService($sesRepo, $userRepo);
    }

    public function index() {
        $user = $this->sesService->current();
        View::render('home.php', [
            "user" => $user
        ]);
    }

}