<?php

namespace UserLoginService\Application;

use Exception;
use UserLoginService\Domain\User;
use UserLoginService\Infrastructure\FacebookSessionManager;

class UserLoginService
{
    private array $loggedUsers = ["username"];

    /**
     * @throws Exception
     */
    public function manualLogin(User $user): void
    {
        if(in_array($user,$this->loggedUsers)){
            throw new Exception('User already logged in');
        }
       $this->loggedUsers[] = $user;
    }

    public function getLoggedUsers(): array
    {
        return $this->loggedUsers;
    }

    public function getExternalSessions(): int
    {
        $numberOfActiveSessions = new FacebookSessionManager();
        return $numberOfActiveSessions->getSessions();
    }
}