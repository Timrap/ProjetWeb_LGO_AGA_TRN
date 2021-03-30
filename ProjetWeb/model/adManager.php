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

    $file = "model/data/ad.json";

    //open or read json data
    $articles = json_decode(file_get_contents($file));

    //
    if (isset($id) && $id != ""){
        $create = false;
    }
    else{
        $create = true;

        if (isset($articles)){
            foreach ($articles as $article) {
                $id = $article->id;
            }
            $id++;
        }
        else $id = 1;
    }

    //
    if (isset($picture["picture"]) && $picture["picture"]["size"] > 0){
        $data["picture"] = uploadPicture($picture);
    }
    else{
        $data["picture"] = $articles[$id-1]->picture;
    }

    $data2add = array('id' => $id, 'categorie' => $data['categorie'], 'title' => $data['title'], 'description' => $data['description'], 'price' => $data['price'], 'picture' => $data["picture"], 'street' => $data['street'], 'city' => $data['city'], 'userEmail' => $_SESSION['userEmailAddress']);

    //append additional json to json file
    if ($create == false){
        foreach ($articles as $data) {
            if ($data->id == $data2add["id"]) {
                $articles[$id-1] = $data2add;
            }
        }
    }
    else{
        $articles[] = $data2add;
    }

    $jsonData = json_encode($articles) . "\n";

    file_put_contents($file, $jsonData,);


    //  json_encode($data);
    return true;
}