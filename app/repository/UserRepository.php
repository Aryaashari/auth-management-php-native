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

    public function findByUsername(string $username) : ?User {
        $stmt = $this->dbConn->prepare("SELECT id, name, username, password FROM users WHERE username=?");
        $stmt->execute([$username]);
        if ($user = $stmt->fetch()) {
            return new User(null,$user["name"],$user["username"], $user["password"]);
        }
        return null;
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
            Database::rollbackTransaction();
            throw $e;
        }
    }

    public function edit(User $user) : User {

        try {

            Database::startTransaction();
            $dateNow = date('Y-m-d H:i:s');
            $stmt = $this->dbConn->prepare("UPDATE users SET name=?, username=?, password=?, update_time=? WHERE id=?");
            $stmt->execute([$user->getName(), $user->getUsername(), $user->getPassword(), $dateNow, $user->getId()]);
            
            $user->setUpdateTime($dateNow);

            Database::commitTransaction();
            return $user;

        } catch(\Exception $e) {
            Database::rollbackTransaction();
            throw $e;
        }

    }

}