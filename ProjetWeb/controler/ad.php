<?php
/**
 * @param $categorie
 */
function articles($categorie){
    require_once "model/adManager.php";
    $articles = viewArticles();
    require_once "view/articles.php";
}

/**
 * @param $id
 */
function articleDelete($id){
    require_once "model/adManager.php";
    deleteAd($id);
    mesAnnonces();
}

/**
 *
 */
function mesAnnonces(){
    require_once "model/adManager.php";
    $articles = viewArticles();
    require_once "view/mesannonces.php";
}

/**
 * @param $id
 */
function adManage($id){
    require_once "model/adManager.php";
    $articles = viewArticles();

    if ($id != ""){
        foreach ($articles as $article){
            if ($article->id == $id){
                require_once "view/adManage.php";
            }
        }
    }
    else{
        require_once "view/adManage.php";
    }
}

/**
 * @param $id
 * @param $data
 * @param $picture
 */
function adValidation($id, $data, $picture){
        require_once "model/adManager.php";
        adUpdate($id, $data, $picture);
        mesAnnonces();
}