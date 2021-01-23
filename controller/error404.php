<?php
require_once 'controller/controller.php';

class Error404 implements Controller {
    public function build() {
        require_once 'views/error404.phtml';
    }
}