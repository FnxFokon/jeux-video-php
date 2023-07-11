<?php require_once './requete/config.php';
require_once './requete/get_games.php';
require_once './template/_jeu.php';
require_once './template/_header.php';
require_once './template/_navbar.php';
// Je traite les cas ou mon $_GET ['console_id'] et ['order'] sont vides en renvoyant une chaine vide
// Ou je renvoie simplement la valeur que j'ai recuperer
$console = empty($_GET['console_id']) ? '' :  $_GET['console_id'];
$order = empty($_GET['order']) ? '' :  $_GET['order'];
?>
<h1>Liste tous les jeux disponible</h1>
<div class="d-flex justify-content-center flex-wrap gap-4">
    <!-- Les informations ainsi traiter je les envoie dans mon fonction de de recuperation des jeux dans la BDD et de rendu de jeu -->
    <?php get_all_games($console, $order); ?>
</div>











<?php require_once './template/_footer.php'; ?>