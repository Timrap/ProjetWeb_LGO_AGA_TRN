<?php
/**
 * Projet                      Project name
 * @file                       dbConnector.php
 * @brief                      File description
 * @author                     Created by Timothée RAPIN
 * Date de création            28.04.2021
 * update                      28.04.2021
 * @version                    0.0
 * @note                       Création du fichier php
 */


/**
 * @brief  This function is designed to exeute a query received as parameter
 * @param $query
 * @return null
 * @link  https://php.net/manual/en/pdo.prepare.php
 */
function executeQuerySelect($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);     // préparation de la requêre
        $statement->execute();                          // Execution de la requête
        $queryResult = $statement->fetchAll();          // Préparation des résultats pour le client
    }
    $dbConnexion = null;                                // Fermeture de ma connection à la DB
    return $queryResult;
}

/**
 * @brief Permet d'executer des requêtes d'insertion
 * @param $query
 * @return null
 */
function executeQueryInsert($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();                  // Ouvre la connection à la BD
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);     // Préparation de la requête
        $statement->execute();                          // Execution de la requête
        $queryResult = true;
    }
    $dbConnexion = null;                                // Fermeture de ma connection à la DB
    return $queryResult;
}

function executeQueryUpdate($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();                  // Ouvre la connection à la BD
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);     // Préparation de la requête
        $statement->execute();                          // Execution de la requête
        $queryResult = true;
    }
    $dbConnexion = null;                                // Fermeture de ma connection à la DB
    return $queryResult;
}


/**
 * @brief
 * @return PDO|null
 */
function openDBConnexion()
{
    $tempDBConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'play.koppa.pro';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'annoncesfaciles';
    $userName = 'annoncesfaciles';
    $userPsw = 'GDASGADSGDSAD.GDSRESSDGASsdiugdsziu2121354';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;

    try {
        $tempDBConnexion = new PDO($dsn, $userName, $userPsw);
    } catch (PDOException $exception) {
        echo 'Connection failed' . $exception->getMessage();
    }

    return $tempDBConnexion;
}

//Classe pour gérer les exeptions liées au modèle
class ModelDataException extends Exception
{

}