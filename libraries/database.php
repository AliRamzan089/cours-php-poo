<?php 

/**
 * Retourne une connexion a la base de donnees.
 * 
 * @return PDO
 */
function pdoConnect(): PDO {
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', 'BIssmillah1989&', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
    return $pdo;
}



