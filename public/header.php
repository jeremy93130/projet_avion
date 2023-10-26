<?php session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/projet_avion/public/assets/css/style.css">
    <title></title>
</head>

<body>
    <header>
        <nav>
            <ul class="logoPrenom">
                <a href="http://localhost/projet_avion/index.php"><img
                        src="../../../projet_avion/public/assets/img/avion_logo.svg" alt="Logo avion"></a>
                <li>
                    <?php if (isset($_SESSION['prenom'])) {
                        echo "Ravis de vous revoir " . $_SESSION['prenom'];
                    }
                    ?>
                </li>
            </ul>
            <ul>
                <?php if (isset($_SESSION['prenom'])) { ?>
                    <li><a href="http://localhost/projet_avion/views/deconnexion.php" class="connect">Se déconnecter</a></li>
                <?php } else { ?>
                    <li><a href="http://localhost/projet_avion/views/connexion.php" class="connect">Se connecter</a></li>
                    <li><a href="http://localhost/projet_avion/views/inscription.php" class="connect">S'inscrire</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
    <div>
        <nav class="menuReserv">
            <ul>
                <?php if (!isset($_SESSION["role"]) || $_SESSION["role"] == "utilisateur") { ?>
                    <li><a
                            href="<?= isset($_SESSION['prenom']) ? "http://localhost/projet_avion/views/reservation.php?id_utilisateur=" . $_SESSION['id'] . "" : "http://localhost/projet_avion/views/connexion.php" ?>">Reserver</a>
                    </li>
                    <li><a href="">Voir les prochains vols</a></li>
                    <li><a
                            href="<?= isset($_SESSION['prenom']) ? "http://localhost/projet_avion/views/reservation_list.php?id_utilisateur=" . $_SESSION['id'] ."" : "http://localhost/projet_avion/views/connexion.php" ?>">Mes
                            réservations en cours</a>
                    </li>
                    <li><a href="">Réclamations</a></li>
                <?php } ?>
                <?php if (isset($_SESSION["role"]) && $_SESSION["role"] == "admin") { ?>
                    <li><a href="http://localhost/projet_avion/views/admin/add_vol.php">Ajouter un vol</a></li>
                    <li><a href="http://localhost/projet_avion/views/admin/add_compagnie.php">Ajouter une compagnie</a></li>
                    <li><a href="http://localhost/projet_avion/views/admin/list_vol.php">Liste des vols</a></li>
                <?php } ?>
            </ul>
        </nav>
    </div>