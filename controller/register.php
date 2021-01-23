<?php
require_once 'controller/controller.php';

class Register implements Controller {
    private $data = [];
    private $password;
    private $passwordRepeat;

    private $errorMessages = [];

    public function __construct() {
        $this->data["username"] = !empty($_POST["username"]) ? $_POST["username"] : "";
        $this->password = !empty($_POST["password"]) ? $_POST["password"] : "";
        $this->passwordRepeat = !empty($_POST["password_repeat"]) ? $_POST["password_repeat"] : "";
        $this->data["firstname"] = !empty($_POST["firstname"]) ? $_POST["firstname"] : "";
        $this->data["lastname"] = !empty($_POST["lastname"]) ? $_POST["lastname"] : "";

        $this->validate();
    }

    private function validate() {
        // if username is already in use:
        if (!empty($this->data["username"]) && $this->data["username"] == "admin") { 
            $this->errorMessages["userError"] = "Username wird bereits verwendet.";
        }

        if ((!empty($this->password) || !empty($this->passwordRepeat)) && $this->password != $this->passwordRepeat) {
            $this->errorMessages["passwordError"] = "Die Passwörter stimmen nicht überein.";
        }

        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["password_repeat"]) || empty($_POST["firstname"]) || empty($_POST["lastname"])) {
            $this->errorMessages["registerError"] = "Registrierungsversuch ungültig.";
        }

        if (empty($this->errorMessages)) {
            $_SESSION["loginStatus"] = true;
            $_SESSION["username"] = $this->data["username"];
            $_SESSION["firstname"] = $this->data["firstname"];
            $_SESSION["lastname"] = $this->data["lastname"];

            header("Location: /StickFlix/");
        }
    }

    public function build() {
        extract($this->errorMessages);
        extract($this->data);

        require_once 'views/register.phtml';
    }
}