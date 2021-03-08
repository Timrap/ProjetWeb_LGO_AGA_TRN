<?php

/**
 * @param $adTitle
 * @param $adContent
 * @return bool
 */
function registerNewAd($adCategorie, $adTitle, $adDescription, $adPrice, $adPicture, $street, $city, $userEmail)
{
    $result = false;

//  Create an array to add in JSON file

    $data2add = array('categorie' => $adCategorie, 'title' => $adTitle, 'description' => $adDescription, 'price' => $adPrice, 'picture' => $adPicture, 'street' => $street, 'city' => $city, 'userEmail' => $userEmail, 'adType' =>'1'."\\n");

    $file = "model/data/ad.json";

//open or read json data
    $data_results = file_get_contents($file);
    $tempArray = json_decode($data_results);

//append additional json to json file
    $tempArray[] = $data2add;
    $jsonData = json_encode($tempArray)."\n";

    file_put_contents($file, $jsonData,);

//    json_encode($data);
    return true;
}

function getData()
{
    return json_decode('',true);
}

/**
 * @param $picture
 * @return string
 */
function uploadPicture($picture){
    /*
    $uploaddir = '/model/data/uploads/';
    $uploadfile = $uploaddir . basename($picture['picture']['name']);

    if (move_uploaded_file($picture['picture']['tmp_name'], $uploadfile)) {
        echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
    } else {
        require_once "view/lost.php";
    }*/

    if(isset($picture['picture'])){
        $uploaddir = './model/data/uploads/';
        $uploadfile = $uploaddir . basename($picture['picture']['name']);
        $errors= array();
        $file_name = $picture['picture']['name'];
        $file_size = $picture['picture']['size'];
        $file_tmp = $picture['picture']['tmp_name'];
        $file_type = $picture['picture']['type'];
        $file_ext=strtolower(end(explode('.',$file_name)));

        $extensions= array("jpeg","jpg","png","svg", "gif");

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG, PNG, GIF or SVG file.";
        }

        if($file_size > 2097152) {
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true) {
            move_uploaded_file($file_tmp,$uploadfile);
        }else{
            print_r($errors);
        }
    }

    return $uploadfile;
}