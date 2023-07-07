<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
$console = empty($_GET['console_id']) ? '' :  $_GET['console_id'];
$order = empty($_GET['order']) ? '' :  $_GET['order'];
?>


<h1>Liste des jeux <?php echo $_GET['console_label'] ?></h1>


<div class="d-flex justify-content-center flex-wrap gap-4">
    <?php get_all_games($console, $order); ?>
</div>



<?php require_once './template/_footer.php'; ?>