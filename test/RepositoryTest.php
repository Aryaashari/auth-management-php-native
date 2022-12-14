<?php
namespace Login\Management;

require_once __DIR__."./../vendor/autoload.php";


use Login\Management\Config\Database;
use Login\Management\Entity\User;
use Login\Management\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class RepositoryTest extends TestCase {
    private \PDO $dbConn;
    private UserRepository $repo;

    public function setUp():void {
        $this->dbConn = Database::getConnection();
        $this->repo = new UserRepository($this->dbConn);
        Database::deleteAll();
    }


    public function testFindByUsername() {
        // Success
        $user = $this->repo->findByUsername("arya_34.5");
        $this->assertIsObject($user);

        // Null
        $user = $this->repo->findByUsername("aryaashari");
        $this->assertNull($user);
    }

    public function testSaveSuccess() {

        $user = $this->repo->save(new User(null, "Arya Ashari", "arya", "12345678", null, null));
        var_dump($user);
        $this->assertIsObject($user);

    }

    public function testSaveFailed() {
        
        $this->expectException(\PDOException::class);
        $user = $this->repo->save(new User(null, "Arya Ashari", "arya", "12345678", null, null));
    }

    
    public function testEdit() {

        $user = $this->repo->save(new user(null, "Arya Ashari", "arya", "12345678", null, null));
        var_dump($user);

        sleep(10);

        $userUpdate = $this->repo->edit(new user($user->getId(), "Arya2", "aryaas", "12345678", $user->getCreateTime()));
        var_dump($userUpdate);

        $this->assertIsObject($userUpdate);

    }


}