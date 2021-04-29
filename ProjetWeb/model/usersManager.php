<?php
/**
 * @file      usersManager.php
 * @brief     This model is designed to implements users business logic
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY (05/20)
 * @author    Updated by Pascal.BENZONANA (01/21)
 * @version   27-JAN-2020
 */

require_once 'model/dbConnector.php';

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
 * @param $userEmailAddress
 * @return string
 */
function firstNameLastName($userEmailAddress){
    $users = json_decode(file_get_contents("model/data/users.json"),true);

    // Scan the users JSON's file to get firstName and lastName
    foreach ($users as $user) {

        if ($userEmailAddress == $user['email']) {
            $firstName = $user['firstName'];
            $lastName = $user['lastName'];
        }
    }

    $result = "$firstName $lastName";

    return $result;
}

/**
 * @brief This function is designed to register a new account
 * @param $userEmailAddress : must be meet RFC 5321/5322
 * @param $userPsw : user's password
 * @return bool : "true" only if the user doesn't already exist. In all other cases will be "false".
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function registerAccount(/*$id, */$userFirstName, $userLastName, $userEmailAddress, $userPsw)
{

    $result = false;

    $strSeparator = "'";

    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);

    $registerQuery = "INSERT INTO users (Firstname, Lastname, Mail, Type, PasswordHash) VALUES ('$userFirstName', '$userLastName', '$userEmailAddress', 0, '$userHashPsw')";

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryInsert($registerQuery);
    if ($queryResult){
        $result = $queryResult;
    }

    return $result;


    /*
    $result = false;

    $file = "model/data/users.json";

    //open or read DB data
    $users = json_decode(file_get_contents($file));
    $users = executeQueryInsert($query));

//  hash password and create an array to add in JSON file
    $userHashPsw = password_hash($userPsw, PASSWORD_DEFAULT);
    $data2add = array('id' => $id, 'firstName' => $userFirstName, 'lastName' => $userLastName, 'email' =>$userEmailAddress, 'hashPwd' => $userHashPsw, 'userType' =>'1');

//append additional json to json file
    if (isset($_SESSION['userEmailAddress']) && $_SESSION['userEmailAddress']!="" && isset($users)){
        foreach ($users as $user) {
            if ($user->id == $data2add["id"]) {
                $users[$id-1] = $data2add;
            }
        }
    }
    else{
        $users[] = $data2add;
    }
    $jsonData = json_encode($users);

    file_put_contents($file, $jsonData);

//    json_encode($data);
    return true;*/
}


/**
 * @param $data
 */
function userManage($data){
    try {
        //variable set
        if (isset($data['inputUserEmailAddress']) && isset($data['inputUserPsw']) && isset($data['inputUserPswRepeat'])) {

            $strSeparator = "'";
            $query = "SELECT users.Firstname, users.Lastname, users.Mail, users.Type, users.PasswordHash FROM users WHERE users.Mail = " . $strSeparator . $data['inputUserEmailAddress'] . $strSeparator;
            $user = executeQuerySelect($query);

            // Test si l'email existe déjà
            $existAccount = false;
            if (isset($user)){
                $dataUser = $user;
                $id = $user['id'];
                $existAccount = true;
            }

            // Si l'email n'existe pas dans la BDD
            if ($existAccount == false){

                // Si l'utilisateur à entré 2 fois le même mot de passe
                if ($data['inputUserPsw'] == $data['inputUserPswRepeat']) {
                    require_once "model/usersManager.php";

                    // Si le compte à bien été créé dans la BDD
                    if (registerAccount($data['inputUserFirstName'], $data['inputUserLastName'], $data['inputUserEmailAddress'], $data['inputUserPsw']))
                    {
                        // Crée la séssion si elle n'éxiste pas
                        if (!isset($_SESSION['userEmailAddress'])){
                            createSession($data['inputUserEmailAddress'],1);
                        }
                        $registerErrorMessage = null;
                        require "view/home.php";
                    }
                    else
                    {
                        $registerErrorMessage = "L'inscription n'est pas possible avec les valeurs saisies !";
                        require "view/register.php";
                    }

                }
                else
                {
                    $registerErrorMessage = "Les mots de passe ne sont pas similaires !";
                    require "view/register.php";
                }
            }
            else{
                $registerErrorMessage = "L'adresse email existe déjà !";
                require "view/register.php";
            }


        }
        else
        {
            //$users = json_decode(file_get_contents("model/data/users.json"),true);
            $strSeparator = "'";
            $query = "SELECT users.Firstname, users.Lastname, users.Mail, users.Type, users.PasswordHash FROM users WHERE users.Mail = " . $strSeparator . $data['inputUserEmailAddress'] . $strSeparator;
            $user = executeQuerySelect($query);


            if (isset($_SESSION['userEmailAddress'])){
                if ($_SESSION['userEmailAddress'] == $user['email']) {
                    $dataUser = $user;
                }
            }
            else{
                if (isset($users)){
                    $dataUser = $data;
                }
            }

            $registerErrorMessage = null;
            require "view/register.php";
        }

    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'enregistrer. Désolé du dérangement !";
        require "view/register.php";
    }
}

function userType($userEmailAddress)
{
    $result = false;

    $res = json_decode(file_get_contents("model/data/users.json"),true);

    // Scan the users JSON's file for userType
    foreach ($res as $item) {

        if ($userEmailAddress == $item['email']) {
            $result = $item['userType'];
        }
    }

    return $result;
}