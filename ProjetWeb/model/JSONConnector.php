<?php
/**
 * @file      JSONConnector.php
 * @brief     This controller is designed to manage database accesses and transactions
 * @author    Created by Pascal.BENZONANA
 * @author    Updated by Nicolas.GLASSEY 13-APR-2020
 * @author    Updated by Nicolas.GLASSEY 29-JAN-2021
 * @version   29-JAN-21
 */


/**
 * @brief This function is designed to manage the JSON file connexion. Closing will be not proceeded there. The client is responsible of this.
 * @return true|false
 * @throws ModelDataBaseException : will be throw if something goes wrong with the database opening process
 */
function openJSONConnection($file)
{
    $ret=0;

    try {
        if($jsonObj = json_decode(file_get_contents($file, true, $depth=512, JSON_THROW_ON_ERROR)))
            return true;
    } catch (Exception $exception) {
        throw new ModelDataBaseException();
    }
    return $jsonObj;
}

/**
 * Class ModelDataBaseException
 * @brief This class is designed to manage specific model exception
 */
class ModelDataBaseException extends Exception
{
}