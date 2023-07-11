<?php

// Fonction de rendu de tous les jeux sur la page index.php
function render_all_game($game)
{
    // Mon chiffre étant stocker sans virgule entre les valeur je traite mon chiffre pour reintégré la virgule
    // Je traite tous les cas de figure

    if ($game['prix'] == 0) {
        // Si mon prix est égale à 0 alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon je formate le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }
?>
    <div class="card mb-3 d-flex flex-column justify-content-between">
        <img src="../images/games/<?php echo $game['image_path'] ?>" class="card-img-top game-img" alt="<?php echo $game['titre'] ?>">
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title game-titre"><?php echo $game['titre'] ?></h5>
            <p class="card-text game-prix"><?php echo $game['prix']; ?></p>
            <a href="../detail.php?game_id=<?php echo $game['id'] ?>" class="btn btn-primary hover game-detail">Voir détail</a>
        </div>
    </div>

<?php
}


// Fonction de rendu de toutes les consoles dans la navbar
function render_all_console($console)
{
?>
    <li>
        <a class="dropdown-item active me-1 hover" href="../list.php?console_id=<?php echo $console['id'] ?>&console_label=<?php echo $console['label'] ?>">
            <?php echo $console['label']; ?> ( <?php echo $console['total']; ?>)
        </a>
    </li>
<?php
}

// Fonction de rendu d'un jeux sur la page detail.php
function render_game_by_id($game)
{
?>
    <div class="card mt-20" style="width: 100%; height: auto;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../images/games/<?php echo $game['image_path'] ?>" class="img-fluid rounded-start game-detail-img" alt="<?php echo $game['titre'] ?>">
            </div>
            <div class="col-md-8 d-flex justify-content-start">
                <div class="card-body">
                    <h5 class="card-title text-primary"><?php echo $game['titre'] ?></h5>
                    <div>
                        <?php get_all_console_by_game_id($game['id']); ?>

                    </div>
                    <p class="card-text"><span class="fw-bold">Synopsis: </span><?php echo $game['description'] ?></p>
                    <p class="card-text"><small class="text-body-secondary fw-lighter">Date de sortie: </small><?php echo $game['date_sortie'] ?></p>
                    <div class="d-flex justify-content-start gap-3 align-items-center">
                        <img src="../images/pegi/<?php echo $game['img_age'] ?>" alt="<?php echo $game['label'] ?>" class="pegi">
                        <p class="card-text"> age: <?php echo $game['label'] ?></p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <div class="d-flex justify-content-around gap-2">
                            <i class="bi bi-star-fill yellow"></i>
                            <p class="card-text"><span class="text-primary">Avis presse: </span><?php echo $game['note_media'] ?>/20</p>
                        </div>
                        <div class="d-flex justify-content-around gap-2">
                            <i class="bi bi-star-fill yellow"></i>
                            <p class="card-text"><span class="text-primary">Avis utilisateur: </span><?php echo $game['note_utilisateur'] ?>/20</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
}

// Fonction de rendu de toutes les consoles disponibles pour un jeu sous forme de badge
function render_all_console_by_game_id($console)
{
?>
    <span class="badge rounded-pill text-bg-primary my-3"><?php echo $console['label'] ?></span>
<?php
}

// Fonction de rendu de tous les jeux disponibles en fonctions des notes (utilisateur et media)
function render_all_game_note($game)
{
    // Mon chiffre étant stocker sans virgule entre les valeur je traite mon chiffre pour reintégré la virgule
    // et je traite tous les cas de figure

    if ($game['prix'] == 0) {
        // Si mon prix est égale à 0 alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon je formate le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }
?>
    <div class="card mb-3 d-flex flex-column justify-content-start">
        <img src="../images/games/<?php echo $game['image_path'] ?>" class="card-img-top game-img" alt="<?php echo $game['titre'] ?>">
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title game-titre"><?php echo $game['titre'] ?></h5>
            <div class="d-flex flex-column justify-content-start">
                <div class="d-flex justify-content-start gap-2">
                    <i class="bi bi-star-fill yellow"></i>
                    <p class="card-text"><span class="text-primary">Avis presse: </span><?php echo $game['note_media'] ?>/20</p>
                </div>
                <div class="d-flex justify-content-start gap-2">
                    <i class="bi bi-star-fill yellow"></i>
                    <p class="card-text"><span class="text-primary">Avis utilisateur: </span><?php echo $game['note_utilisateur'] ?>/20</p>
                </div>
            </div>
            <p class="card-text game-prix"><?php echo $game['prix']; ?></p>
            <a href="../detail.php?game_id=<?php echo $game['id'] ?>" class="btn btn-primary hover game-detail">Voir détail</a>
        </div>
    </div>

<?php
}

// Fonction de rendu de tous les jeux seulon l'age
function render_all_game_age($game)
{
    // Mon chiffre étant stocker sans virgule entre les valeur je traite mon chiffre pour reintégré la virgule
    // Je traite tous les cas de figure

    if ($game['prix'] == 0) {
        // Si mon prix est égale à 0 alors il est gratuit
        $game['prix'] = "GRATUIT";
    } else {
        // Sinon je formate le prix
        $game['prix'] = number_format($game['prix'] / 100, 2, ',', ' ') . "€";
    }
?>
    <div class="card mb-3 d-flex flex-column justify-content-start">
        <img src="../images/games/<?php echo $game['image_path'] ?>" class="card-img-top game-img" alt="<?php echo $game['titre'] ?>">
        <div class="card-body d-flex flex-column justify-content-between">
            <h5 class="card-title game-titre"><?php echo $game['titre'] ?></h5>
            <div class="d-flex justify-content-start gap-3 align-items-center">
                <img src="../images/pegi/<?php echo $game['img_age'] ?>" alt="<?php echo $game['label'] ?>" class="pegi">
                <p class="card-text"> age: <?php echo $game['label'] ?></p>
            </div>
            <p class="card-text game-prix"><?php echo $game['prix']; ?></p>
            <a href="../detail.php?game_id=<?php echo $game['id'] ?>" class="btn btn-primary hover game-detail">Voir détail</a>
        </div>
    </div>

<?php
}
