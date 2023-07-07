<?php
// On va créer une connexxion à la BDD (Base De Données)
// On va définir des constantes pour se conecter à la BDD
define('DB_HOST', 'database');
define('DB_USER', 'admin');
define('DB_PASS', 'admin');
define('DB_NAME', 'video-games');

// On va créer une variable pour stocker le résultat de la connexion à la BDD
// Et on étable la connexion avec la base de données
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// On va vérifier la connexion
if (!$connection) {
    // On test si il y a une erreur
    die('Erreur: ' . mysqli_connect_error()); // "die" c'est pour stop le script
}

// On force l'encodage en UTF 8 pour la prise en charge des caractères spéciaux
mysqli_set_charset($connection, 'utf8');
// mysqli_query($mysqli, 'SET NAMES utf8');