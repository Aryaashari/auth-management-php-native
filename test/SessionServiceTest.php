<?php

namespace Login\Management;

use Login\Management\Config\Database;
use Login\Management\Entity\User;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;
use Login\Management\Service\SessionService;
use PHPUnit\Framework\TestCase;

class SessionServiceTest extends TestCase{


    private SessionRepository $sesRepo;
    private SessionService $sesService;
    private UserRepository $userRepo;

    public function setUp() : void {
        $this->sesRepo = new SessionRepository(Database::getConnection());
        $this->userRepo = new UserRepository(Database::getConnection());
        $this->sesService = new SessionService($this->sesRepo);
        Database::deleteAll("sessions");
        Database::deleteAll("users");
    }


    public function testCreateSuccess() {

        $user = $this->userRepo->save(new User(null, "Arya Ashari", "arya", "12345678"));
        var_dump($user);
        $session = $this->sesService->create($user->getId(), false);
        var_dump($session);
        $this->assertIsObject($session);

    }

}