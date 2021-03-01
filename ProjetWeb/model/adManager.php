<?php

/**
 * @param $adTitle
 * @param $adContent
 * @return bool
 */
function registerNewAd($adCategorie, $adTitle, $adDescription, $adPrice, $street, $city, $userEmail)
{
    $result = false;

//  Create an array to add in JSON file

    $data2add = array('categorie' => $adCategorie, 'title' => $adTitle, 'description' => $adDescription, 'price' => $adPrice, 'street' => $street, 'city' => $city, 'userEmail' => $userEmail, 'adType' =>'1');

    $file = "model/data/ad.json";

//open or read json data
    $data_results = file_get_contents($file);
    $tempArray = json_decode($data_results);

//append additional json to json file
    $tempArray[] = $data2add ;
    $jsonData = json_encode($tempArray);

    file_put_contents($file, $jsonData);

//    json_encode($data);
    return true;
}
