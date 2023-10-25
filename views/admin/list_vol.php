<!-- <link rel="stylesheet" href="../assets/css/style.css"> -->
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Compagnieclass.php');
require_once("../inc/header.php");
$listVol = Vols::listVols();
$listCompagnie = Compagnie::compagnie();
?>


<h2>Liste des vols passés et/ou à venir</h2>
<table class="listvol">
    <tr>
        <th>Date de Départ
        </th>
        <th>Heure de départ
        </th>
        <th>Date d'arrivée
        </th>
        <th>
            Heure d'arrivée
        </th>
        <th>Ville de Départ
        </th>
        <th>Ville d'arrivée</th>
        <th>Compagnie Aérienne</th>
        <th>Action</th>
    </tr>
    <?php foreach ($listVol as $vol) {
        if ($vol["disponibilite"] == "disponible") {
            ?>
                <tr class="vols">
                    <td>
                        <?= $vol["date_depart"] ?>
                    </td>
                    <td>
                        <?= $vol["heure_depart"] ?>
                    </td>
                    <td>
                        <?= $vol["date_arrivee"] ?>
                    </td>
                    <td>
                        <?= $vol["heure_arrivee"] ?>
                    </td>
                    <td>
                        <?= $vol["ville_depart"] ?>
                    </td>
                    <td>
                        <?= $vol["ville_arrivee"] ?>
                    </td>
                    <td><?= $vol["nom_compagnie"] ?></td>
                    <td>
                        <a href="">Modifier</a>
                        /
                        <a href="http://localhost/projet_avion/views/admin/delete_vol.php?delete=<?= $vol["id_vol"] ?>">Supprimer</a>
                    </td>
                </tr>
        <?php }
    } ?>

</table>

<script src="../../assets/js/structure.js"></script>

