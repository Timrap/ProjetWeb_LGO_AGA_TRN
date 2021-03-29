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
        case "validationAd" :
            validationAd($_POST, $_FILES);
            break;
        case "articles" :
            articles($_POST);
            break;
        case "articleModify" :
            articleModify($_GET['articleId']);
            break;
        case "confirmationmodif" :
            confirmationmodif($_GET['articleId'], $_POST);
            break;
        case "accountmodify" :
            accountModify();
            break;
        case "confirmationAccount" :
            confirmationAccount();
            break;
        case "mesAnnonces" :
            mesAnnonces();
            break;
        case "articleDelete" :
            articleDelete($_GET['articleId']);
            break;
        default :
            lost();
    }
} else {
    home();
}