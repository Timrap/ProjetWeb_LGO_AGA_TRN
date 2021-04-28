<?php

/**
 * @file      users.php
 * @brief     This controller is designed to manage all users actions
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY
 * @version   13-APR-2020
 */


/**
 * @brief This function is designed to create a new user session
 * @param $userEmailAddress : user unique id, must be meet RFC 5321/5322
 */
function createSession($userEmailAddress, $userType)
{
    $_SESSION['userEmailAddress'] = $userEmailAddress;
    $_SESSION['userType'] = $userType;
    $_SESSION['userTypeView'] = "1";
}

/**
 * @brief This function is designed to manage login request
 * @param $loginRequest containing login fields required to authenticate the user
 */
function login($loginRequest)
{
    //if login request was submitted
    try {
        if (isset($loginRequest['inputUserEmailAddress']) && isset($loginRequest['inputUserPsw'])) {
            //extract login parameters
            $userEmailAddress = $loginRequest['inputUserEmailAddress'];
            $userPsw = $loginRequest['inputUserPsw'];

            //try to check if user/psw are matching with the database
            require_once "model/usersManager.php";
            if (isLoginCorrect($userEmailAddress, $userPsw)) {
                $userType = userType($userEmailAddress);
                $loginErrorMessage = null;
                createSession($userEmailAddress, $userType);
                require "view/home.php";
            } else { //if the user/psw does not match, login form appears again with an error message
                $loginErrorMessage = "L'adresse email et/ou le mot de passe ne correspondent pas !";
                require "view/login.php";
            }
        } else { //the user does not yet fill the form
            require "view/login.php";
        }
    } catch (ModelDataBaseException $ex) {
        $loginErrorMessage = "Nous rencontrons actuellement un problème technique. Il est temporairement impossible de s'annoncer. Désolé du dérangement !";
        require "view/login.php";
    }
}

/**
 * @brief This function is designed to manage logout request
 * @remark In case of login, the user session will be destroyed.
 */
function logout()
{
    $_SESSION = array();
    session_destroy();
    require "view/home.php";
}

/**
 * @brief This function is designed manage the register request
 * @param $register : contains all fields mandatory and optional to register a new user (coming from a form)
 */
function register($data)
{
    require_once 'model/usersManager.php';
    userManage($data);
}

function userName($userEmail){
    require_once "model/usersManager.php";
    return firstNameLastName($userEmail);
}


function accountModify()
{
    require_once "view/accountmodify.php";
}

function confirmationAccount()
{
    require_once "view/confirmationAccount.php";
}



function accountManage($data)
{
    require_once 'model/usersManager.php';
    userManage($data);

    /*

    require_once "model/adManager.php";
    $file = "model/data/users.json";

    //open or read json data
    $users = json_decode(file_get_contents($file));

    if (isset($_SESSION['userEmailAddress'])){
        $id = $_SESSION['userEmailAddress'];
        foreach ($users as $user){
            if ($user->id == $id){
                require_once "view/accountmodify.php";
            }
        }
    }
    else{
        require_once "view/register.php";
    }


    /*
    $id = accountId();


    $users = viewUsers();

    if (isset($_SESSION['userEmailAddress']) && $id != ""){
        foreach ($users as $user){
            if ($user->id == $id){
                require_once "view/accountmodify.php";
            }
        }
    }
    else{
        require_once "view/register.php";
    }


    userManage($data);*/
}
/*
function accountValidation($data){
    require_once 'model/usersManager.php';
    userValidation($data);
}*/

function viewType($userTypeView){
    $_SESSION['userTypeView'] = $userTypeView['viewType'];
    home();
}