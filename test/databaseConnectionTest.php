<?php
namespace Login\Management;


require_once __DIR__."./../vendor/autoload.php";


use \PHPUnit\Framework\TestCase;
use \Login\Management\Config\Database;

class databaseConnectionTest extends TestCase {

    public function testConnectionSuccess() {
        $db = Database::getConnection();
        $this->assertNotNull($db);
        $this->assertIsObject($db);
    }

    public function testConnectionSame() {
        $db = Database::getConnection();
        $db2 = Database::getConnection();
        $this->assertSame($db, $db2);
    }

    public function testConnectionFailed() {
        $this->expectException(\PDOException::class);
        $db = Database::getConnection();
    }

}