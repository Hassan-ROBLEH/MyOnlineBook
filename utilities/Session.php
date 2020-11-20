<?php


class Session
{
    public function __construct()
    {
        if(session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @param User $user
     * @return void
     */
    public function login(User $user) : void
    {
        $_SESSION["user"] = [
            "id" => $user->getId(),
            "pseudo" => $user->getFirstName(),
            "email" => $user->getEmail(),
            "logged" => true,
            "role" => $user->getRole(),
            "activated" => $user->isActivated()
        ];
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $_SESSION['user']['id'];
    }

    /**
     * @return bool
     */
    public function islogged() : bool
    {
        if(isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
            if($_SESSION['user']['logged']) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return bool
     */
    public function isAdmin() : bool
    {
        if (isset($_SESSION['user']) && !is_null($_SESSION['user'])) {
            if (isset($_SESSION['user']['logged']) && $_SESSION['user']['role'] === 'admin') {
                return true;
            }
        }
        return false;
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        if(isset($_SESSION['user'])) {
            unset($_SESSION['user']);
        }
    }

    public function affiche(): void
    {
        if(isset($_SESSION["message"]) && !is_null($_SESSION["message"])) {

        }
    }
}