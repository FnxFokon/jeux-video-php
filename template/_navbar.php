<div class="d-flex flex-column w-100">
    <div class="d-flex justify-content-between">
        <a href="../index.php">
            <img class="m-2 logo" src="../images/logo.png" alt="Logo du site">
        </a>
        <a class="nav-item" aria-current="page" href="#">Tous les jeux</a>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-tertiary custom-background ">
        <ul class="nav nav-pills nav-tabs">
            <li class="nav-item zoom">
                <a class="nav-link active me-1" aria-current="page" href="../index.php">Tous les jeux</a>
            </li>
            <li class="nav-item dropdown zoom">
                <a class="nav-link active me-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Par console
                </a>
                <ul class="dropdown-menu active me-1 active me-1 py-2 mt-1 bg-primary">
                    <?php get_all_console(); ?>
                </ul>
            </li>
            <li class="nav-item dropdown zoom">
                <a class="nav-link active me-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Par Prix
                </a>
                <ul class="dropdown-menu active me-1 active me-1 py-2 mt-1 bg-primary">
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../index.php?order=asc">Prix Croissant</a>
                    </li>
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../index.php?order=desc">Prix Décroissant</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown zoom">
                <a class="nav-link active me-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Par Note
                </a>
                <ul class="dropdown-menu active me-1 active me-1 py-2 mt-1 bg-primary">
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../note.php?note=la presse">Note Presse</a>
                    </li>
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../note.php?note=les utilisateurs">Note Utilisateur</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown zoom">
                <a class="nav-link active me-1 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Par Age
                </a>
                <ul class="dropdown-menu active me-1 active me-1 py-2 mt-1 bg-primary">
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../age.php?age=Croissant">Age Croissant</a>
                    </li>
                    <li>
                        <a class="dropdown-item active me-1 hover" href="../age.php?age=Décroissant">Age Décroissant</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item zoom">
                <a class="nav-link active me-1" aria-current="page" href="../connexion.php">Log</a>
            </li>
        </ul>
    </nav>
</div>