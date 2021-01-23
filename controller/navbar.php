<?php
require_once 'controller/controller.php';

class Navbar implements Controller{
    var $loggedIn;

    public function __construct($logginStatus) {
        $loggedIn = $logginStatus;
    }

    public function build() {
        require_once 'views/navbar.phtml';
    }
}