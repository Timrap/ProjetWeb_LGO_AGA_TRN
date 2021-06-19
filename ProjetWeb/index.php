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
        case "mesAnnonces" :
            dispayAd(NULL);
            break;
        case "articleDelete" :
            articleDelete($_GET['articleId']);
            break;
        case "administration" :
            administration();
            break;
        case 'accountManage' :
            accountManage($_POST);
            break;
        case "adManage" :
            adManage($_GET['articleId']);
            break;
        case "adValidation" :
            adValidation($_GET['articleId'], $_POST, $_FILES);
            break;
        case "viewType" :
            viewType($_POST);
            break;
        case "userDelete" :
            userDelete($_GET);
            break;
        case 'userManage' :
            userAccountManage($_POST, $_GET);
            break;
        case 'articleDetails' :
            articleDetails($_GET['id']);
            break;

        default :
            lost();
    }
} else {
    home();
}