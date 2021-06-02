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
    $query = "SELECT users.passwordHash FROM users WHERE users.mail = " . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);
    $queryResult = $queryResult[0];
    if ($queryResult){
        if (password_verify($userPsw, $queryResult['passwordHash'])){
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
    $query = "SELECT users.firstName, users.lastName FROM users WHERE mail = " . $strSeparator . $userEmailAddress . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);
    $user = $queryResult[0];

    $firstName = $user['firstName'];
    $lastName = $user['lastName'];

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

    $registerQuery = "INSERT INTO users (firstName, lastName, mail, type, passwordHash) VALUES ('$userFirstName', '$userLastName', '$userEmailAddress', 0, '$userHashPsw')";

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
            $query = "SELECT users.firstName, users.lastName, users.mail, users.type, users.passwordHash FROM users WHERE users.mail = " . $strSeparator . $data['inputUserEmailAddress'] . $strSeparator;
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
    $query = "SELECT users.type FROM users WHERE mail = " . $strSeparator . $userEmailAddress . $strSeparator;
    $user = executeQuerySelect($query);
    $user = $user[0];
    $result = $user['type'];
    return $result;
}

function userDeleteFromDB($userId){
    $result = false;

    $strSeparator = "'";

    $DeleteQuery = "DELETE FROM users WHERE id = " . $strSeparator . $userId . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryInsert($DeleteQuery);
    if ($queryResult){
        $result = $queryResult;
    }

    return $result;
}

function userAccountManageInDb($data, $userId){
    $userId = $userId['userId'];
    
    $strSeparator = "'";
    $query = "SELECT users.firstName, users.lastName, users.mail, users.type, users.passwordHash FROM users WHERE users.id = " . $strSeparator . $userId . $strSeparator;
    
    require_once 'model/dbConnector.php';
    $queryResult = executeQuerySelect($query);
    $user = $queryResult[0];
    
    try {
        //variable set
        if (isset($userId) && isset($data['inputUserEmailAddress'])){

            // Test si l'email existe déjà
            $strSeparator = "'";
            $query = "SELECT users.mail FROM users WHERE users.id = " . $strSeparator . $userId . $strSeparator;
            $queryResult = executeQuerySelect($query);
            $userEmail = $queryResult[0];
            $existAccount = false;
            if (isset($userEmail) && $userEmail!="" && $userEmail!=null && $userEmail!=0 && $userEmail['mail']!=$user['mail']){
                $existAccount = true;
            }

            // Si l'email n'existe pas dans la BDD
            if ($existAccount == false){

                // Si l'utilisateur à entré 2 fois le même mot de passe
                /*if ($data['inputUserPsw'] == $data['inputUserPswRepeat']) {
                    require_once "model/usersManager.php";*/

                // S'il y a toujours 1 administrateur
                $query = "SELECT users.mail FROM users WHERE users.type = 2";
                $queryResult = executeQuerySelect($query);
                $nbAdmin = 0;
                foreach ($queryResult as $result){
                    $nbAdmin++;
                }
                if ($data['inputUserType']>1 || $nbAdmin>1) {
    
                    // Si le compte à bien été créé dans la BDD
                    if (updateAccount($userId, $data['inputUserFirstName'], $data['inputUserLastName'], $data['inputUserEmailAddress'], $data['inputUserType'])) {
                        $registerErrorMessage = NULL;
                        administration();
                    }
                    else {
                        $registerErrorMessage = "L'inscription n'est pas possible avec les valeurs saisies !";
                        require "view/updateUser.php";
                    }
                }
                else
                {
                    $registerErrorMessage = "Il faut minimum 1 Administrateur !";
                    require "view/updateUser.php";
                }
/*
                }
                else
                {
                    $registerErrorMessage = "Les mots de passe ne sont pas similaires !";
                    require "view/updateUser.php";
                }*/
            }
            else{
                $registerErrorMessage = "L'adresse email existe déjà !";
                require "view/updateUser.php";
            }
        }
        else
        {
            $registerErrorMessage = null;
            require "view/updateUser.php";
        }

    } catch (ModelDataBaseException $ex) {
        $registerErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'enregistrer. Désolé du dérangement !";
        require "view/updateUser.php";
    }
}

function updateAccount($userId, $userFirstName, $userLastName, $userEmailAddress, $userType)
{
    $result = false;

    $strSeparator = "'";

    $query = "UPDATE users SET firstName = '$userFirstName', lastName = '$userLastName', mail = '$userEmailAddress', type = '$userType' WHERE id = " . $strSeparator . $userId . $strSeparator;

    require_once 'model/dbConnector.php';
    $queryResult = executeQueryUpdate($query);
    if ($queryResult){
        $result = $queryResult;
    }

    return $result;
}