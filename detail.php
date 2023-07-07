<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
// var_dump($_GET['game_id']); 
?>

    <?php get_game_by_id($_GET['game_id']); ?>

<?php require_once './template/_footer.php'; ?>