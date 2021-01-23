<?php
require_once 'controller/controller.php';

class Login implements Controller {
    private $username;
    private $password;

    private $data;

    public function __construct() {
        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            $this->username = $_POST["username"];
            $this->password = $_POST["password"];

            $this->validate();
        }
    }

    private function validate() {
        if (!empty($_POST["username"]) && !empty($_POST["password"])) {
            // Future extension: Validation data from database
            if ($_POST["username"] == "admin" && $_POST["password"] == "admin")  {
                $_SESSION["loginStatus"] = true;
                $_SESSION["firstname"] = "Admin";

                header("Location: /StickFlix/");
            } else {
                $this->data["errorMessage"] = "Ungültige Logindaten. Bitte überprüfen sie Username und Passwort.";
            }
        }
    }

    public function build() {
        if (!empty($this->data["errorMessage"])) {
            extract($this->data);
        }

        require_once 'views/login.phtml';
    }
}