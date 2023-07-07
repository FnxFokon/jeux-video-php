<?php
function get_all_games($console, $order)
{
    global $connection;
    if ($console == '') {
        // On créer la requete sql
        $query = "SELECT id, titre, prix, image_path FROM jeu";
        if ($order == 'asc') {
            $query .= " ORDER BY prix ASC";
        } else if ($order == 'desc') {
            $query .= " ORDER BY prix DESC";
        }
        // On éxécute la requete
        if ($result = mysqli_query($connection, $query)) {

            // On vérifie que l'on a des resultats
            if (mysqli_num_rows($result) > 0) {

                // On parcours les résultats
                while ($game = mysqli_fetch_assoc($result)) {

                    // Ici le rendu HTML d'un jeu
                    render_all_game($game);                // var_dump($game);
                }
            } else { ?>
                <div class="alert alert-warning" role="alert">
                    Aucun jeu trouvé
                </div>
            <?php
            }
        } else { ?>
            <div class="alert alert-warning" role="alert">
                Echec de connexion
            </div>
        <?php
        }
    } else {
        // On créer la requete sql
        $query = "SELECT c.label, j.id, j.titre, j.prix, j.image_path
                FROM jeu as j
                INNER JOIN game_console AS gc ON j.id = gc.jeu_id
                INNER JOIN console AS c ON gc.console_id = c.id
                WHERE c.id = ?;";

        if ($order == 'asc') {
            $query .= " ORDER BY j.prix ASC";
        } else if ($order == 'desc') {
            $query .= " ORDER BY j.prix DESC";
        }
        // On prépare la requete avec mysqli_prepare()
        if ($stmt = mysqli_prepare($connection, $query)) {

            // On peux bind le/les parametre avec mysqli_stmt_bind_param()
            mysqli_stmt_bind_param(
                $stmt,  // 1ere paramètre la requete préparé
                "i",    // 2eme paramètre le type de paramètre (i pour interger, s pour string, d pour double)
                $console     // 3eme paramètre la variable qui contient la valeur du paramètre  
            );

            // 5- On execute la requete avec mysqli_stmt_execute()
            if (mysqli_stmt_execute($stmt)) {
                if ($result = mysqli_stmt_get_result($stmt)) {

                    // On verifie que l'on est au moins un résultat
                    if (mysqli_num_rows($result) > 0) {
                        // Si je rentre dans la condition c'est que j'ai au moins un résultat

                        // On passe le resultat dans un tableau assiciatif avec mysqli_fetch_assoc()
                        while ($game = mysqli_fetch_assoc($result)) {

                            // Maintenant dans la boucle, c'est ici qu'il faut faire le rendu HTML
                            // et c'est $variable qui contient les données de chaque ligne de la table toys
                            render_all_game($game);
                        }
                    } else {

                        // Si je rentre dans le else c'est que je n'ai pas de résultat
                        // On peux faire un rendu HTML pour dire qu'il n'y a pas de résultat
                        echo "<h1>Il n'y a pas de jeu</h1>";
                    }
                }
            } else {

                // Ici on gere l'erreur lors de l'execution de la requete
                die("Erreur lors de l'execution de la requete");
            }
        } else {

            // Ici on gére l'erreur si la connexion n'est pas bonne ou la requete est mal écrite.
            die("Erreur dans la requete sql: $query");
        }
    }
}

function get_all_console()
{
    global $connection;
    // On créer la requete sql
    $query = "SELECT c.id, c.label, COUNT(j.id) as total
            FROM console AS c
            INNER JOIN game_console AS gc ON c.id = gc.console_id
            INNER JOIN jeu AS j ON gc.jeu_id = j.id
            GROUP BY c.id, c.label;";
    // On éxécute la requete
    if ($result = mysqli_query($connection, $query)) {

        // On vérifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {

            // On parcours les résultats
            while ($console = mysqli_fetch_assoc($result)) {

                // Ici le rendu HTML d'un jouet
                render_all_console($console);
                // var_dump($console);
            }
        } else { ?>
            <div class="alert alert-warning" role="alert">
                Aucune console trouvé
            </div>
<?php
        }
    }
}

function get_game_by_id($game)
{
    global $connection;
    // On créer la requete sql
    $query = "SELECT
    j.id,
    j.titre,
    j.description,
    j.date_sortie,
    j.image_path,
    n.note_media,
    n.note_utilisateur,
    ra.image_path as img_age,
    ra.label
    FROM jeu as j
    INNER JOIN restriction_age AS ra ON j.age_id = ra.id
    INNER JOIN note AS n ON j.note_id = n.id
    WHERE j.id = ?;";

    // On prépare la requete avec mysqli_prepare()
    if ($stmt = mysqli_prepare($connection, $query)) {

        // On peux bind le/les parametre avec mysqli_stmt_bind_param()
        mysqli_stmt_bind_param(
            $stmt,  // 1ere paramètre la requete préparé
            "i",    // 2eme paramètre le type de paramètre (i pour interger, s pour string, d pour double)
            $game   // 3eme paramètre la variable qui contient la valeur du paramètre  
        );

        // 5- On execute la requete avec mysqli_stmt_execute()
        if (mysqli_stmt_execute($stmt)) {
            if ($result = mysqli_stmt_get_result($stmt)) {

                // On verifie que l'on est au moins un résultat
                if (mysqli_num_rows($result) > 0) {
                    // Si je rentre dans la condition c'est que j'ai au moins un résultat

                    // On passe le resultat dans un tableau assiciatif avec mysqli_fetch_assoc()
                    while ($game = mysqli_fetch_assoc($result)) {

                        // Maintenant dans la boucle, c'est ici qu'il faut faire le rendu HTML
                        // et c'est $variable qui contient les données de chaque ligne de la table toys
                        render_game_by_id($game);
                        // var_dump($game);
                    }
                } else {

                    // Si je rentre dans le else c'est que je n'ai pas de résultat
                    // On peux faire un rendu HTML pour dire qu'il n'y a pas de résultat
                    echo "<h1>Il n'y a pas de jeu</h1>";
                }
            }
        } else {

            // Ici on gere l'erreur lors de l'execution de la requete
            die("Erreur lors de l'execution de la requete");
        }
    } else {

        // Ici on gére l'erreur si la connexion n'est pas bonne ou la requete est mal écrite.
        die("Erreur dans la requete sql: $query");
    }
}

function get_all_console_by_game_id($game_id)
{
    global $connection;
    // On créer la requete sql
    $query = "SELECT c.label
    FROM jeu as j
        INNER JOIN game_console AS gc ON j.id = gc.jeu_id
        INNER JOIN console AS c ON gc.console_id = c.id
    WHERE j.id = ?;";

    // On prépare la requete avec mysqli_prepare()
    if ($stmt = mysqli_prepare($connection, $query)) {

        // On peux bind le/les parametre avec mysqli_stmt_bind_param()
        mysqli_stmt_bind_param(
            $stmt,  // 1ere paramètre la requete préparé
            "i",    // 2eme paramètre le type de paramètre (i pour interger, s pour string, d pour double)
            $game_id   // 3eme paramètre la variable qui contient la valeur du paramètre  
        );

        // 5- On execute la requete avec mysqli_stmt_execute()
        if (mysqli_stmt_execute($stmt)) {
            if ($result = mysqli_stmt_get_result($stmt)) {

                // On verifie que l'on est au moins un résultat
                if (mysqli_num_rows($result) > 0) {
                    // Si je rentre dans la condition c'est que j'ai au moins un résultat

                    // On passe le resultat dans un tableau assiciatif avec mysqli_fetch_assoc()
                    while ($console = mysqli_fetch_assoc($result)) {

                        // Maintenant dans la boucle, c'est ici qu'il faut faire le rendu HTML
                        // et c'est $variable qui contient les données de chaque ligne de la table toys
                        render_all_console_by_game_id($console);
                        // var_dump($console);
                    }
                } else {

                    // Si je rentre dans le else c'est que je n'ai pas de résultat
                    // On peux faire un rendu HTML pour dire qu'il n'y a pas de résultat
                    echo "<h1>Il n'y a pas de jeu</h1>";
                }
            }
        } else {

            // Ici on gere l'erreur lors de l'execution de la requete
            die("Erreur lors de l'execution de la requete");
        }
    } else {

        // Ici on gére l'erreur si la connexion n'est pas bonne ou la requete est mal écrite.
        die("Erreur dans la requete sql: $query");
    }
}

function get_all_games_by_note($note)
{
    global $connection;
    // On créer la requete sql
    $query = "SELECT
        j.id,
        j.titre,
        j.prix,
        j.image_path,
        n.note_media,
        n.note_utilisateur
    FROM jeu as j
    INNER JOIN note as n ON j.note_id = n.id";
    if ($note == 'la presse') {
        $query .= " ORDER BY n.note_media DESC";
    } else if ($note == 'les utilisateurs') {
        $query .= " ORDER BY n.note_utilisateur DESC";
    }

    // On éxécute la requete
    if ($result = mysqli_query($connection, $query)) {

        // On vérifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {

            // On parcours les résultats
            while ($game = mysqli_fetch_assoc($result)) {

                // Ici le rendu HTML d'un jeu
                render_all_game_note($game);
                // var_dump($game);
            }
        }
    }
}
function get_all_games_by_age($age)
{
    global $connection;
    // On créer la requete sql
    $query = "SELECT
        j.id,
        j.titre,
        j.prix,
        j.image_path,
        ra.label,
        ra.image_path AS img_age
    FROM jeu AS j
    INNER JOIN restriction_age AS ra ON j.age_id = ra.id";

    if ($age == 'Croissant') {
        $query .= " ORDER BY ra.label ASC";
    } else if ($age == 'Décroissant') {
        $query .= " ORDER BY ra.label DESC";
    }

    // On éxécute la requete
    if ($result = mysqli_query($connection, $query)) {

        // On vérifie que l'on a des resultats
        if (mysqli_num_rows($result) > 0) {

            // On parcours les résultats
            while ($game = mysqli_fetch_assoc($result)) {

                // Ici le rendu HTML d'un jeu
                render_all_game_age($game);
                // var_dump($game);
            }
        }
    }
}
