<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
require_once './template/_form.php';


// Je donne les arguments pour que ma fonction form affiche ce que je veux
form(
    "Se connecter",
    "./api/authentication.php",
    "Se connecter",
    "Vous n'avez pas de compte ?",
    "../create.php",
    "Inscrivez-vous"
);


require_once './template/_footer.php';
