<?php

namespace Login\Management\Service;

use Login\Management\Config\Database;
use Login\Management\Repository\SessionRepository;


class SessionService {
    
    private SessionRepository $repo;
    public function __construct()
    {
        $this->repo = new SessionRepository(Database::getConnection());
    }

    // public function create(int $userId) {

    //     $session = $this->repo->save($userId);

    // }

}