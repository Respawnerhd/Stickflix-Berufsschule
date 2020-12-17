<?php
class ControllerFactory {
    static function ofType($type) {
        switch ($type) {
            case "home":
                require_once 'controller/home.php';
                return new Home();
                break;

            // case "login":
            //     require_once 'controller/login.php';
            //     return new Login();
            //     break;

            default:
                require_once 'controller/home.php';
                return new Home();
                break;
        }
    }
}