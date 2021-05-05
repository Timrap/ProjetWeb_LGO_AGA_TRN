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

    $strSeparator = "'";
    $query = "SELECT users.PasswordHash FROM users WHERE users.Mail = " . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);
    $queryResult = $queryResult[0];
    if ($queryResult){
        if (password_verify($userPsw, $queryResult['PasswordHash'])){
            return true;
        }
    }

    return $result;
}

/**
 * @param $userEmailAddress
 * @return string
 */
function firstNameLastName($userEmailAddress){


    $strSeparator = "'";
    $query = "SELECT Firstname, Lastname FROM users WHERE Mail = " . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);
    $user = $queryResult[0];

    $firstName = $user['Firstname'];
    $lastName = $user['Lastname'];

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
            if (isset($user) && $user!="" && $user!=null && $user!=0){
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
    $strSeparator = "'";
    $query = "SELECT users.Type FROM users WHERE Mail = " . $strSeparator . $userEmailAddress . $strSeparator;
    $user = executeQuerySelect($query);
    $result = $user['userType'];
    return $result;
}