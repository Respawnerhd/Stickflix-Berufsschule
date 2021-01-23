<?php
require_once 'controller/navbar.php';
require_once 'includes/controller_factory.php';

session_start();

// Check login status
// Possible Future Addition: Extend with Database
$loginStatus = !empty($_SESSION["loginStatus"]);

// Decision which side to open
if (!empty($_GET["site"])) {
    $site = $_GET["site"];
} else {
    $site = null;
}

if ($loginStatus && empty($site)) {
    $site = "home";
} else if (!$loginStatus && $site != "login" && $site != "register") {
    $site = "login";
}

$controller = ControllerFactory::ofType($site);

// 1.   Header information
require_once 'includes/head.phtml';

// 2.   Body
// 2.1  Navbar
$navbar = new Navbar($loginStatus); 
$navbar->build();
// 2.2  Content
$controller->build();

// 3.   Foot
require_once 'includes/foot.phtml';