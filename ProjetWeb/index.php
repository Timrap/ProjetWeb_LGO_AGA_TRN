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
        case 'createAd' :
            createAd();
            break;
        case "adMenu" :
            adMenu ();
            break;
        case "validationAd" :
            validationAd($_POST);
            break;
        case "articles" :
            articles($_POST);
            break;
        case "admodify" :
            admodify();
            break;
        case "confirmationmodif" :
            confirmationmodif();
            break;
        default :
            lost();
    }
} else {
    home();
}