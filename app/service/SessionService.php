<?php

namespace Login\Management\Service;

use Login\Management\Config\Database;
use Login\Management\Entity\Session;
use Login\Management\Entity\User;
use Login\Management\Repository\SessionRepository;
use Login\Management\Repository\UserRepository;

class SessionService {

    public static $cookieName = "X-SESSION";
    private SessionRepository $repo;
    private UserRepository $userRepo;
    
    public function __construct(SessionRepository $repo, UserRepository $userRepo)
    {
        $this->repo = $repo;
        $this->userRepo = $userRepo;
    }

    public function create(int $userId, bool $isRemember) : Session {

        $sessionId = uniqid();
        $session = new Session($sessionId, $userId);
        $this->repo->save($session);
        
        setcookie(self::$cookieName, $sessionId, ($isRemember) ? time() + (60 * 60 * 24 * 3) : 0, "/");

        return $session;

    }

    public function current() : ?User {

        if (isset($_COOKIE[self::$cookieName])) {
            $session = $this->repo->findById($_COOKIE[self::$cookieName]);
            $user = $this->userRepo->findById($session->getUserId());
            return $user;
        }

        return null;

    }

    public function destroy() : void {
        $currentSession = $_COOKIE[self::$cookieName];
        if (!is_null($currentSession)) {
            $this->repo->remove($currentSession);
            setcookie(self::$cookieName, null, -1, "/");
        }
    }

}