<?php

/**
 * @param $articles
 * @param $adCategorie
 * @param $adTitle
 * @param $adDescription
 * @param $adPrice
 * @param $adPicture
 * @param $street
 * @param $city
 * @param $userEmail
 * @return bool
 */
function registerNewAd($articles, $adCategorie, $adTitle, $adDescription, $adPrice, $adPicture, $street, $city, $userEmail)
{
    $result = false;

    foreach ($articles as $article) {
        $id = $article->id;
    }
    $id++;

//  Create an array to add in JSON file

    $data2add = array('id' => $id, 'categorie' => $adCategorie, 'title' => $adTitle, 'description' => $adDescription, 'price' => $adPrice, 'picture' => $adPicture, 'street' => $street, 'city' => $city, 'userEmail' => $userEmail);

    $file = "model/data/ad.json";

//open or read json data
    $data_results = file_get_contents($file);
    $tempArray = json_decode($data_results);

//append additional json to json file
    $tempArray[] = $data2add;
    $jsonData = json_encode($tempArray) . "\n";

    file_put_contents($file, $jsonData,);

//    json_encode($data);
    return true;
}

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
 * @param $article
 * @param $picture
 * @return bool
 */
function modifAd($id, $article, $picture)
{
    $result = false;

//  Create an array to add in JSON file

    $file = "model/data/ad.json";

//open or read json data
    $data_results = file_get_contents($file);
    $tempArray = json_decode($data_results);

//
    if (isset($picture["picture"]) && $picture["picture"]["size"] > 0){
        $article["picture"] = uploadPicture($picture);
    }
    else{
        $article["picture"] = $tempArray[$id-1]->picture;
    }

    $data2add = array('id' => $id, 'categorie' => $article["categorie"], 'title' => $article["title"], 'description' => $article["description"], 'price' => $article["price"], 'picture' => $article["picture"], 'street' => $article["street"], 'city' => $article["city"], 'userEmail' => $_SESSION["userEmailAddress"]);

//append additional json to json file
    foreach ($tempArray as $data) {
        if ($data->id == $data2add["id"]) {
            $tempArray[$id-1] = $data2add;
        }
    }
    $jsonData = json_encode($tempArray) . "\n";

    file_put_contents($file, $jsonData,);

//    json_encode($data);
    return true;
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
    $tempArray = json_decode($data_results);


//append additional json to json file
    foreach ($tempArray as $data) {
        if ($data->id == $id) {
            $tempArray[$id-1] = $data2add;
        }
    }
    //$tempArray[$id] = $data2add;
    $jsonData = json_encode($tempArray) . "\n";

    file_put_contents($file, $jsonData,);

//    json_encode($data);
    return true;
}