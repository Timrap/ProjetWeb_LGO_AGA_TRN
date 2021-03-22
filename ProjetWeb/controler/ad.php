<?php
/**
 *
 */
function createAd()
{
    require "view/createAd.php";
}

/**
 * @param $validationAd
 */
function validationAd ($validationAd, $picture)
{
    require_once "model/adManager.php";

    $articles = viewArticles();

    $adCategorie = $validationAd['categorie'];
    $adTitle = $validationAd['title'];
    $adDescription = $validationAd['description'];
    $adPrice = $validationAd['price'];
    $adPicture = uploadPicture($picture);
    $street = $validationAd['street'];
    $city = $validationAd['city'];
    $userEmail = $_SESSION['userEmailAddress'];

    registerNewAd($articles, $adCategorie, $adTitle, $adDescription, $adPrice, $adPicture, $street, $city, $userEmail);
    require "view/validationAd.php";
}

function articles($categorie){
    require_once "model/adManager.php";
    $articles = viewArticles();
    require_once "view/articles.php";
}

function articleModify($id)
{
    require_once "model/adManager.php";
    $articles = viewArticles();

    foreach ($articles as $article){
        if ($article->id == $id){
            require_once "view/admodify.php";
        }
    }
}

function confirmationmodif()
{
    require_once "view/confirmationmodif.php";
}

function mesAnnonces(){
    require_once "model/adManager.php";
    $articles = viewArticles();
    require_once "view/mesannonces.php";
}
