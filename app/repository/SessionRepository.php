<?php

namespace Login\Management\Repository;

use Login\Management\Entity\Session;

class SessionRepository {

    private \PDO $dbConn;

    public function __construct(\PDO $db)
    {
        $this->dbConn = $db;
    }


    public function save(Session $session) : void {

        try {

            $stmt = $this->dbConn->prepare("INSERT INTO sessions(id,user_id) VALUES (?,?)");
            $stmt->execute([$session->getId(), $session->getUserId()]);
            $id = $this->dbConn->lastInsertId();
        } catch(\Exception $err) {
            throw $err;
        }

    }


}