<?php

/**
 * @param $picture
 * @return string
 */
function uploadPicture($picture)
{
    if (isset($picture['picture'])) {
        $uploaddir = './model/data/uploads/';
        $uploadfile = $uploaddir . basename($picture['picture']['name']);
        $errors = array();
        $file_name = $picture['picture']['name'];
        $file_size = $picture['picture']['size'];
        $file_tmp = $picture['picture']['tmp_name'];
        $file_type = $picture['picture']['type'];
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
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.Users_id FROM advertisements WHERE id = " . $strSeparator . $id . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $article = $queryResult[0];
        }
    }
    else if (isset($category) && $category != NULL){
        $strSeparator = "'";
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.Users_id FROM advertisements WHERE advertisements.category = " . $strSeparator . $category . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $articles = $queryResult;
            return $articles;
        }
    }
    else{
        $strSeparator = "'";
        $query = "SELECT advertisements.id, advertisements.title, advertisements.category, advertisements.description, advertisements.image, advertisements.price, advertisements.Users_id FROM advertisements INNER JOIN users ON advertisements.Users_id = users.id WHERE users.mail =" . $strSeparator . $_SESSION['userEmailAddress'] . $strSeparator;
    
        require_once 'model/dbConnector.php';
        $queryResult = executeQuerySelect($query);
        if ($queryResult){
            $articles = $queryResult;
            return $articles;
        }
    }
    
    
    return  $article;
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
function adUpdate($id, $data, $userEmailAddress){
    $result = false;

    $title = $data['title'];
    $category = $data['category'];
    $description = $data['description'];
    $image = "view\contents\images\pas-image-disponible.png";
    $price = $data['price'];
    $enable = $data['enable'];


    //transformation en int

    $price = intVal($price);
    $category = intVal($category);
    $id = intVal($id);


    /* if(!is_file($image))
    {
        $image = "view\contents\images\pas-image-disponible.png";
    }
    else {
        $image = "view\contents\images\pas-image-disponible.png";
    }
*/
    /*
    if (isset($picture["picture"]) && $picture["picture"]["size"] > 0){
        $data["picture"] = uploadPicture($picture);
    }
    else{
        $data["picture"] = $articles[$id-1]->picture;
    }
    */

    //$data['street'], 'city' => $data['city'], 'userEmail' => $_SESSION['userEmailAddress']);

    //si l'article existe déjà modifi l'article
    if (isset($id) && $id != ""){

        $strSeparator = "'";
        $query = "UPDATE advertisements SET title = '$title', category = $category, description = '$description', image = '$image', price = $price WHERE id = " . $id;

        }
    //créer l'article
    else {
        $strSeparator = "'";

        $query = "INSERT INTO advertisements (title, category, description, image, price, enable, Users_id) VALUES ('$title', $category, '$description','$image', $price, 1,$Users_id)";
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