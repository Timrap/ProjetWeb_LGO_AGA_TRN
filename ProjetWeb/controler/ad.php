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
    if ($id != ""){
        require_once "model/adManager.php";
        modifAd($id, $data, $picture);
        mesAnnonces();
    }
    else{
        require_once "model/adManager.php";

        $articles = viewArticles();

        $adCategorie = $data['categorie'];
        $adTitle = $data['title'];
        $adDescription = $data['description'];
        $adPrice = $data['price'];
        $adPicture = uploadPicture($picture);
        $street = $data['street'];
        $city = $data['city'];
        $userEmail = $_SESSION['userEmailAddress'];

        registerNewAd($articles, $adCategorie, $adTitle, $adDescription, $adPrice, $adPicture, $street, $city, $userEmail);

        mesAnnonces();
    }
}