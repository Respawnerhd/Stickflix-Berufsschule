<?php
require_once 'controller/controller.php';

class Logout implements Controller {
    public function __construct() {
        session_unset();
        header("Location: /StickFlix/");
    }

    public function build() {
        require_once 'views/login.phtml';
    }
}