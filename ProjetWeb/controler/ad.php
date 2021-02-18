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
    registerNewAd($adTitle, $adDescription, $adPrice);
    require "view/validationAd.php";
}
/*
function registerNewAdInJson($validationAd){
    require_once "data/adManager";
    $adTitle = $validationAd['title'];
    $adDescription = $validationAd['description'];
    $adPrice = $validationAd['price'];
    registerNewAccount($adTitle, $adDescription, $adPrice);
}*/