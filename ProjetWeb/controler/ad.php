<?php
function createAd()
{
    require "view/createAd.php";
}

function adMenu()
{
    require "view/adMenu.php";
}

function validationAd ($validationAd)
{
    require_once "model/adManager.php";
    $adTitle = $validationAd['title'];
    $adDescription = $validationAd['description'];
    $adPrice = $validationAd['price'];
    $userEmail = $_SESSION['userEmailAddress'];
    registerNewAd($adTitle, $adDescription, $adPrice, $userEmail);
    require "view/validationAd.php";
}