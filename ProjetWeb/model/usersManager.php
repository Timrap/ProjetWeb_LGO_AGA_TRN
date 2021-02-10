<?php
/**
 * @file      usersManager.php
 * @brief     This model is designed to implements users business logic
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY (05/20)
 * @author    Updated by Pascal.BENZONANA (01/21)
 * @version   27-JAN-2020
 */

/**
 * @brief This function is designed to verify user's login
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : users's password
 * @return bool : "true" only if the user and psw match the database. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function isLoginCorrect($userEmailAddress, $userPsw)
{
   $result = false;

   $res = json_decode(file_get_contents("model/data/users.json"),true);

   // Scan the users JSON's file to check login and pswd
   foreach ($res as $item) {

        if ($userEmailAddress == $item['email']) {
            if (password_verify($userPsw, $item['hashPwd'])){
                return true;
            }
        }
   }

   return $result;
}

/**
 * @brief This function is designed to register a new account
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : user's password
 * @return bool : "true" only if the user doesn't already exist. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function registerNewAccount($userEmailAddress, $userPsw)
{
    $result = false;

//  hash password and create an array to add in JSON file
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $data2add = array('email' =>$userEmailAddress, 'hashPwd' => $userHashPsw, 'userType' =>'1');

    $file = "model/data/users.json";

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