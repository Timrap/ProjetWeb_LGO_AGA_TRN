<?php

session_start();
require "controler/navigation.php";
require "controler/users.php";


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
        default :
            lost();
    }
} else {
    home();
}