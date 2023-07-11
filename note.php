<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
?>
<!-- Je recupere grace aux $_GET l'information du game_id que j'ai fais passez dans l'URL -->

<h1>Listes des jeux évalué par <?php echo $_GET['note'] ?></h1>


<div class="d-flex justify-content-center flex-wrap gap-4">
    <!-- Les informations ainsi recuperer je les envoie dans mon fonction de de recuperation des jeux dans la BDD et de rendu de jeu -->
    <?php get_all_games_by_note($_GET['note']); ?>
</div>



<?php require_once './template/_footer.php'; ?>