<?php

namespace Login\Management\Service;

use Login\Management\Config\Database;
use Login\Management\Entity\Session;
use Login\Management\Repository\SessionRepository;


class SessionService {

    public static $cookieName = "X-SESSION";
    private SessionRepository $repo;
    
    public function __construct(SessionRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create(int $userId, bool $isRemember) : Session {

        $sessionId = uniqid();
        $session = new Session($sessionId, $userId);
        $this->repo->save($session);
        
        setcookie(self::$cookieName, $sessionId, ($isRemember) ? time() + (60 * 60 * 24 * 3) : 0, "/");

        return $session;

    }

    public function current() : ?string {

        if (isset($_COOKIE[self::$cookieName])) {
            return $_COOKIE[self::$cookieName];
        }

        return null;

    }

    public function destroy() : void {
        $currentSession = $this->current();
        if (!is_null($currentSession)) {
            $this->repo->remove($currentSession);
            setcookie(self::$cookieName, null, -1, "/");
        }
    }

}