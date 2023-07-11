<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
?>
<!-- Je recupere grace aux $_GET l'information du game_id que j'ai fais passez dans l'URL -->

    <?php get_game_by_id($_GET['game_id']); ?>

<?php require_once './template/_footer.php'; ?>