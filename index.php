<?php
require_once 'controller/navbar.php';
require_once 'includes/controller_factory.php';

// Check login status
// TODO: Extend with Database?
$loginStatus = !empty($_COOKIE["loginStatus"]);

// Decision which side to open
$site = $_GET["site"] ?? null;

if ($loginStatus && empty($site)) {
    $site = "home";
} else if (!$loginStatus) {
    $site = "login";
}

$controller = ControllerFactory::ofType($site);

// 1.   Header information
require_once 'head.html';

// 2.   Body
// 2.1  Navbar
$navbar = new Navbar($loginStatus); 
$navbar->build();
// 2.2  Content
$controller->build();

// 3.   Foot
require_once 'foot.html';