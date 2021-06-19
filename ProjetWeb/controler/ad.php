<?php
/**
 * @param $categorie
 */
function articles($categorie){
    require_once "model/adManager.php";
    $articles = viewArticles(NULL, $categorie["categorie"]);
    require_once "view/articles.php";
}

/**
 * @param $id
 */
function articleDelete($id){
    require_once "model/adManager.php";
    deleteAd($id);
    dispayAd($id);
}

/**
 *
 */
function dispayAd($id){
    if ($id != NULL){
        require_once "model/adManager.php";
        $articles = viewArticles($id, NULL);
        require_once "view/myAds.php";
    }
    else{
        require_once "model/adManager.php";
        $articles = viewArticles(NULL, NULL);
        require_once "view/myAds.php";
    }
}

/**
 * @param $id
 */
function adManage($id){
    require_once "model/adManager.php";
    $article = viewArticles($id, NULL);

    require_once "view/adManage.php";
    
}

/**
 * @param $id
 * @param $data
 * @param $picture
 */
function adValidation($id, $data){
        require_once "model/adManager.php";
        adUpdate($id, $data, $_SESSION['userEmailAddress']);
        dispayAd(NULL);
}