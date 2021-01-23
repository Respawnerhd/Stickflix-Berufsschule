<?php
class ControllerFactory {
    static function ofType($type) {
        switch ($type) {
            case "home":
                require_once 'controller/home.php';
                return new Home();
                break;

            case "login":
                require_once 'controller/login.php';
                return new Login();
                break;

            case "register":
                require_once 'controller/register.php';
                return new Register();
                break;

            case "logout":
                require_once 'controller/logout.php';
                return new Logout();
                break;

            default:
                require_once 'controller/error404.php';
                return new Error404();
                break;
        }
    }
}