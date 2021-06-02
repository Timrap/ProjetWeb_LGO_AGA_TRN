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
function viewArticles()
{
    $file = "model/data/ad.json";

    //open or read json data

    return json_decode(file_get_contents($file));
}

/**
 * @param $id
 * @return bool
 */
function deleteAd($id)
{
    $result = false;

//  Create an array to add in JSON file
    $data2add = array('id' => $id);

    $file = "model/data/ad.json";

//open or read json data
    $data_results = file_get_contents($file);
    $articles = json_decode($data_results);


//append additional json to json file
    foreach ($articles as $data) {
        if ($data->id == $id) {
            $articles[$id-1] = $data2add;
        }
    }
    //$tempArray[$id] = $data2add;
    $jsonData = json_encode($articles) . "\n";

    file_put_contents($file, $jsonData,);

//    json_encode($data);
    return true;
}

/**
 * @param $id
 * @param $data
 * @param $picture
 * @return bool
 */
function adUpdate($id, $data, $picture){
    $result = false;

    $title = $data['title'];
    $category = $data['category'];
    $description = $data['description'];
    $image = $data['image'];
    $price = $data['price'];
    //$Users_id = $data['User_id'];


    //transformation en int

    $price = intVal($price);
    //$Users_id = intVal($Users_id);
    $category = intVal($category);


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
        $query = "UPDATE advertisements SET title = '$title' SET category = '$category' SET description = '$description' SET image = '$image' SET price = '$price' SET Users_id = '$Users_id' WHERE id = " . $strSeparator . $id . $strSeparator;

        }
    //créer l'article
    else {
        $strSeparator = "'";
        $query = "INSERT INTO advertisements (title, category, description, image, price/*, Users_id*/) VALUES ('$title', '$category', '$description','$image', '$price')";

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