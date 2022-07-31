<?php

namespace Login\Management\Repository;

use Login\Management\Entity\Session;

class SessionRepository {

    private \PDO $dbConn;

    public function __construct(\PDO $db)
    {
        $this->dbConn = $db;
    }


    public function save(int $userId) : Session {

        try {

            $stmt = $this->dbConn->prepare("INSERT INTO sessions(user_id) VALUES (?)");
            $stmt->execute([$userId]);
            $id = $this->dbConn->lastInsertId();
    
            $session = new Session($id, $userId);
            return $session;
        } catch(\Exception $err) {
            throw $err;
        }

    }


}