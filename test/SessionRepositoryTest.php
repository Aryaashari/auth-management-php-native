<?php


namespace Login\Management;

use Login\Management\Config\Database;
use Login\Management\Entity\Session;
use Login\Management\Entity\User;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class SessionRepositoryTest extends TestCase {
    
    private \PDO $dbConn;
    private SessionRepository $repo;
    private UserRepository $userRepo;

    public function setUp() : void {
        $this->dbConn = Database::getConnection();
        $this->repo = new SessionRepository($this->dbConn);
        $this->userRepo = new UserRepository($this->dbConn);
    }

    public function testSaveSuccess() {

        $user = $this->userRepo->save(new User(null, "Arya Ashari", "aryaa", "12345678"));
        var_dump($user);
        $this->repo->save(new Session(uniqid(), $user->getId()));

        $this->assertIsObject($user);

    }

}