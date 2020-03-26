<?php
/**
 * Created by PhpStorm.
 * User: pictime
 * Date: 23/01/20
 * Time: 00:51
 */

$DB_HOST="localhost";
$DB_NAME="Etienne";
$DB_USER="etienne";
$DB_PASS="etienne";

$DATA_DIR="./data";
$ARCHIVE_DIR="./archives";
$WORKING_DIR="./working";


//Ouverture de la connection mysql
try {
    $pdo = new PDO('mysql:host=' . $DB_HOST . ';port=3306;dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
}
catch(Exception $e)
{
    echo 'Erreur : '.$e->getMessage().'<br />';
    echo 'N° : '.$e->getCode();
    exit();
}