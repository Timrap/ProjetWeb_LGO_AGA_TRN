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
        case "articles" :
            articles($_POST);
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


        case 'accountManage' :
            accountManage($_POST);
            break;
        /*case 'accountValidation' :
            accountValidation($_POST);
            break;*/
        case "adManage" :
            adManage($_GET['articleId']);
            break;
        case "adValidation" :
            adValidation($_GET['articleId'], $_POST, $_FILES);
        break;
        case "viewType" :
            viewType($_POST);
            break;

        default :
            lost();
    }
} else {
    home();
}