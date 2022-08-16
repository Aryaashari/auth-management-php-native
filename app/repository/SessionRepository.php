<?php

namespace Login\Management\Repository;

use Login\Management\Entity\Session;

class SessionRepository {

    private \PDO $dbConn;

    public function __construct(\PDO $db)
    {
        $this->dbConn = $db;
    }

    public function findById(string $id) : ?Session {
        $stmt  = $this->dbConn->prepare("SELECT id,user_id FROM sessions WHERE id=?");
        $stmt->execute([$id]);

        if ($session = $stmt->fetch()) {
            return new Session($session["id"], $session["user_id"]);
        }

        return null;
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

    public function remove(string $sesId) : void {

        $stmt = $this->dbConn->prepare("DELETE FROM sessions WHERE id=?");
        $stmt->execute([$sesId]);

    }


}