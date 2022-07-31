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
        Database::deleteAll();
    }

    public function testSaveSuccess() {

        $user = $this->userRepo->save(new User(null, "Arya Ashari", "arya", "12345678"));
        var_dump($user);
        $session = $this->repo->save($user->getId());
        var_dump($session);

        $this->assertIsObject($user);
        $this->assertIsObject($session);

    }

}