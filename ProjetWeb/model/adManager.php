<?php

/**
 * @param $picture
 * @return string
 */
function uploadPicture($image)
{
    if (isset($image)) {
        $uploaddir = './view/contents/images/';
        $uploadfile = $uploaddir . basename($image['name']);
        $errors = array();
        $file_name = $image['name'];
        $file_size = $image['size'];
        $file_tmp = $image['tmp_name'];
        $file_type = $image['type'];
        $file_ext = substr( strrchr($file_name, '.'), 1);

        $extensions = array("jpeg", "jpg", "png", "svg", "gif");

        if (in_array($file_ext, $extensions) === false) {
            $errors[] = "extension not allowed, please choose a JPEG, PNG, GIF or SVG file.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'File size must be excately 2 MB';
        }

        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, $uploadfile);
        } else {
            print_r($errors);
        }
    }

    return $uploadfile;
}

/**
 * @return mixed
 */
function viewArticles($id, $category)
{
    if (isset($id) && $id != NULL){
        $strSeparator = "'";
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.street, advertisements.city, advertisements.enable, advertisements.Users_id FROM advertisements WHERE id = " . $strSeparator . $id . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $article = $queryResult[0];
            return  $article;
        }
    }
    else if (isset($category) && $category != NULL){
        $strSeparator = "'";
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.street, advertisements.city, advertisements.Users_id FROM advertisements WHERE advertisements.enable = 1 && advertisements.category = " . $strSeparator . $category . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $articles = $queryResult;
            return $articles;
        }
    }
    else{
        $strSeparator = "'";
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.street, advertisements.city, advertisements.enable, advertisements.Users_id FROM advertisements INNER JOIN users ON advertisements.Users_id = users.id WHERE users.mail =" . $strSeparator . $_SESSION['userEmailAddress'] . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $articles = $queryResult;
            return $articles;
        }
    }
}

/**
 * @param $id
 * @return bool
 */
function deleteAd($id)
{
    $off = '0';

    $strSeparator = "'";
    $query = "UPDATE advertisements SET enable = '$off'WHERE id = " . $strSeparator . $id . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryUpdate($query);
    if ($queryResult) {
        $result = $queryResult;
    }
}

/**
 * @param $id
 * @param $data
 * @param $picture
 * @return bool
 */
function adUpdate($id, $data, $image, $userEmailAddress){
    $result = false;

    $title = $data['title'];
    $category = $data['category'];
    $description = $data['description'];
    
    $price = $data['price'];
    if (isset($data['enable']) && $data['enable'] >=0 && $data['enable'] <2){
        $enable = $data['enable'];
    }
    else{
        $enable = 1;
    }
    
    $street = $data['street'];
    $city = $data['city'];


    //transformation en int

    $price = intVal($price);
    $category = intVal($category);
    if (isset($id) && $id != ""){
        $id = intVal($id);
    }
    

/*
    if(!is_file($data['image']))
    {
        $image = "view\contents\images\pas-image-disponible.png";
    }
    else {
        $image = "view\contents\images\pas-image-disponible.png";
    }
*/
    
    if (isset($image) && $image["size"] > 0){
        $image = uploadPicture($image);
    }
    else{
        $image = "view\contents\images\pas-image-disponible.png";
        $query = "SELECT advertisements.image FROM advertisements WHERE advertisements.id =" . $id;
        require_once 'model/dbConnector.php';
        $image = executeQuerySelect($query)[0][0];
    }

    //si l'article existe déjà modifie l'article
    if (isset($id) && $id != ""){

        $strSeparator = "'";
        $query = "UPDATE advertisements SET title = '$title', category = $category, description = '$description', image = '$image', price = $price, street = '$street', city = '$city', enable = $enable WHERE id = " . $id;

        }
    //créer l'article
    else {
        $strSeparator = "'";
        require_once 'model/dbConnector.php';
        $query = "SELECT users.id FROM users WHERE users.mail =" . $strSeparator . $userEmailAddress . $strSeparator;
        $Users_id = executeQuerySelect($query)[0][0];
        $query = "INSERT INTO advertisements (title, category, description, image, price, street, city, enable, Users_id) VALUES ('$title', $category, '$description','$image', $price, '$street', '$city', 1, $Users_id)";
    }
    require_once 'model/dbConnector.php';
    $queryResult = executeQueryUpdate($query);
    if ($queryResult){
        $result = $queryResult;
    }
}

/*
    $jsonData = json_encode($articles) . "\n";

    file_put_contents($file, $jsonData,);


    //  json_encode($data);
    return true;
}
*/

function addLike($adId, $userEmailAddress)
{
    $userId = userId($userEmailAddress);
    
    if (existLike($adId, $userEmailAddress)){
        $query = "DELETE FROM advertisements_has_users WHERE Advertisements_id = " . $adId . " AND Users_id = " . $userId;
        $queryResult = executeQuerySelect($query);
        if ($queryResult) {
            $result = $queryResult;
        }
    }
    else{
        
        //$timezone = date_default_timezone_get();
        //$timestamp = strtotime("now", $timezone);
        date_default_timezone_set('Europe/Zurich');
        $timestamp = time();
        $datetime = date('Y-m-d H:i:s', $timestamp);
    
        $query = "INSERT INTO advertisements_has_users (Advertisements_id, Users_id, date) VALUE ($adId, $userId, '$datetime')";
        $queryResult = executeQueryInsert($query);
        if ($queryResult) {
            $result = $queryResult;
        }
    }
}
    
function existLike($adId, $userEmailAddress){
    $userId = userId($userEmailAddress);
    
    //transformation en int
    $adId = intVal($adId);
    
    $strSeparator = "'";
    $query = "SELECT Advertisements_id, Users_id FROM advertisements_has_users WHERE Advertisements_id  = " . $adId . " AND Users_id = " . $userId;
    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($query);
    
    return $queryResult;
}

function userId ($userEmailAddress){
    $strSeparator = "'";
    $query = "SELECT users.id FROM users WHERE users.mail = " . $strSeparator . $userEmailAddress . $strSeparator;
    require_once "model/dbConnector.php";
    $queryResult = executeQuerySelect($query);
    if ($queryResult) {
        $userId = $queryResult[0][0];
        
        //transformation en int
        $userId = intVal($userId);
        
        return $userId;
    }
}