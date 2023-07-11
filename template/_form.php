<?php
// Fonction qui affiche le formulaire adequat seulon ce que l'on veux faire (se conecter ou s'enregistrer)
function form($title, $action, $button_name, $text, $link, $button_link)
{
?>
    <!-- FORMULAIRE D'INSCRIPTION EN DUR -->
    <div id="wrapper">
        <form action="<?= $action ?>" method="post">
            <h2><?= $title ?></h2>
            <!-- Pour l'affichage des erreurs -->
            <!-- le principe: Renvoyer l'erreur à travers l'URL au retour du serveur -->
            <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error'] ?></p>
            <?php } ?>
            <label for="email">Email</label>
            <input type="text" name="email" placeholder="Votre email">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" placeholder="Votre mot de passe">
            <div class="box_button">
                <button type="submit"><?= $button_name ?></button>
                <p class="sub_text"> <?= $text ?>
                    <a href="<?= $link ?>" class="link"><?= $button_link ?></a>
                </p>
            </div>
        </form>
    </div>
<?php

};
?>