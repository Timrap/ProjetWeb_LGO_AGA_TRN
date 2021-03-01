<?php
/**
 *
 */
function createAd()
{
    require "view/createAd.php";
}

/**
 *
 */
function adMenu()
{
    require "view/adMenu.php";
}

/**
 * @param $validationAd
 */
function validationAd ($validationAd)
{
    require_once "model/adManager.php";
    $adTitle = $validationAd['title'];
    $adDescription = $validationAd['description'];
    $adPrice = $validationAd['price'];
    //$adPicture = $validationAd['picture'];
    $street = $validationAd['street'];
    $city = $validationAd['city'];
    $userEmail = $_SESSION['userEmailAddress'];
    registerNewAd($adTitle, $adDescription, $adPrice, $street, $city, $userEmail);
    require "view/validationAd.php";
}