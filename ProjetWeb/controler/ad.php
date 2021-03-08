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
    $adCategorie = $validationAd['categorie'];
    $adTitle = $validationAd['title'];
    $adDescription = $validationAd['description'];
    $adPrice = $validationAd['price'];
    //$adPicture = $validationAd['picture'];
    $street = $validationAd['street'];
    $city = $validationAd['city'];
    $userEmail = $_SESSION['userEmailAddress'];
    registerNewAd($adCategorie, $adTitle, $adDescription, $adPrice, $street, $city, $userEmail);
    require "view/validationAd.php";
}

function articles($article){
    require_once "view/articles.php";
}

function admodify()
{
    require_once "view/admodify.php";
}

function confirmationmodif()
{
    require_once "view/confirmationmodif.php";
}
