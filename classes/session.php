<?php

class Session{
    private $sessionName = 'user';
    private $rol = 'rol';
    private $ruc='ruc';
    public function __construct(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function setCurrentUser($user){
        $_SESSION[$this->sessionName] = $user;
    }
    public function setCurrentRol($rol){
        $_SESSION[$this->rol]=$rol;
    }
    public function getCurrentRol(){
        return $_SESSION[$this->rol];
    }
    public function getCurrentUser(){
        return $_SESSION[$this->sessionName];
    }
    public function setCurrentRUC($rucX){
        $_SESSION[$this->ruc]=$rucX;
    }
    public function getCurrentRUC(){
        return $_SESSION[$this->ruc];
    }
    public function closeSession(){
        session_unset();
        session_destroy();
    }

    public function exists(){
        return isset($_SESSION[$this->sessionName]);
    }
}


?>