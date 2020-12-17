<?php
require_once 'includes/controller_factory.php'; 

class Home implements Controller {
    public function build() {
        require_once 'views/home.html';
    }
}