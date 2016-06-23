<?php

class Auth {

    function __construct() {
        
    }

    public static function notLogged() {
        Session::init();
        if (!Session::get('loggedIn')) {
            header('Location: login');
            exit;
        }
    }

    public static function logged() {
        Session::init();
        if (Session::get('loggedIn')) {
            header('Location: main');
            exit;
        }
    }
    
    public static function failRegister() {
        Session::init();
        if (!Session::get('error')) {
            header('Location: register');
            exit;
        }
    }

}
