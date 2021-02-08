<?php

function login(){
    if (isset($_SESSION['login'])){
        echo "Vous êtes " . $_SESSION['login'] . " !";
    }
    else {
        $_SESSION['login'] = "Timothée";
        echo "Session " . $_SESSION['login'] . " crée !";
    }
}