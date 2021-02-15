<?php

session_start();
require "controler/navigation.php";
require "controler/users.php";
require "controler/ad.php";


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    switch ($action) {
        case 'home' :
            home();
            break;
        case 'login' :
            login($_POST);
            break;
        case 'logout' :
            logout();
            break;
        case 'register' :
            register($_POST);
            break;
        case 'CGU' :
            CGU();
            break;
        case 'createad' :
            createad();
            break;
        case "annoncesmenu" :
            annoncesmenu ();
            break;
        case "validationad" :
            validationad();
            break;
        default :
            lost();
    }
} else {
    home();
}