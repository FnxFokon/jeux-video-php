<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
?>


<h1>Listes des jeux par tranche d'age <?php echo $_GET['age'] ?></h1>


<div class="d-flex justify-content-center flex-wrap gap-4">
    <?php get_all_games_by_age($_GET['age']) ?>
</div>



<?php require_once './template/_footer.php'; ?>