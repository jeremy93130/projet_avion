<link rel="stylesheet" href="../assets/css/style.css">
<?php
require_once('./inc/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
$dispoVol = Vols::listVols();
$id_utilisateur = isset($_GET["id_utilisateur"]) ? $_GET["id_utilisateur"] : null;

?>

<section class="reservation">
    <form action="./traitement/action.php" method="post">
        <input type="hidden" value=<?= $id_utilisateur ?> name="id_utilisateur">
        <div>
            <h2>Où voulez vous partir?</h2>
        </div>
        <div>
            <h3>Liste des vols disponibles</h3>
            <select name="departs" id="vol_depart">
                <?php foreach ($dispoVol as $vol) { ?>
                    <option value="<?= $vol["id_vol"] ?>">
                        <?= $vol["ville_depart"] . "/" . $vol["ville_arrivee"];
                        ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="passagers">Nombre de passagers</label>
            <input type="number" name="nb_passager">
            <label for="passagers">Choix du siège</label>
            <input type="number" name="siege">
        </div>
        <div>
            <label for="date">Date de départ</label>
            <input type="date" name="depart_date">
        </div>
        <div>
            <input type="text" disabled>
        </div>
        <input type="submit" name="reserver" value="Reserver">
    </form>
</section>
<script src="../assets/js/structure.js"></script>