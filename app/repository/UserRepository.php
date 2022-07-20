<?php 

namespace Login\Management\Repository;

use Exception;
use Login\Management\Entity\User;
use Login\Management\Execption\UserException;
use \PDOException;
use Login\Management\Config\Database;
use Mockery\CountValidator\Exact;

class UserRepository {

    private \PDO $dbConn;

    public function __construct(\PDO $db)
    {
        $this->dbConn = $db;
    }


    public function save(User $user) : User {
        
        try {
            Database::startTransaction();
            $dateNow = date('Y-m-d H:i:s');
            $stmt = $this->dbConn->prepare("INSERT INTO users(name,username,password,create_time,update_time) VALUES (?,?,?,?,?);");
            $stmt->execute([
                $user->getName(),
                $user->getUsername(),
                $user->getPassword(),
                $dateNow,
                $dateNow
            ]);
    
            $user->setId($this->dbConn->lastInsertId());
            $user->setCreateTime($dateNow);
            $user->setUpdateTime($dateNow);

            Database::commitTransaction();
            return $user;

        } catch (\Exception $e) {
            echo $e;
            Database::rollbackTransaction();
            throw $e;
        }
    }

}