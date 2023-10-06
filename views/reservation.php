<link rel="stylesheet" href="../assets/css/style.css">
<?php
require_once('./inc/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Reserveclass.php');
$dispoVol = Vols::listVols();
$id_utilisateur = isset($_GET["id_utilisateur"]) ? $_GET["id_utilisateur"] : null;
$listSieges = Reservation::choixSieges();

?>

<section class="reservation">
    <form action="./traitement/action.php" method="post">
        <div class="container-reservation">

            <input type="hidden" value=<?= $id_utilisateur ?> name="id_utilisateur">
            <div>
                <h2>Où voulez vous partir?</h2>
            </div>
            <h3>Liste des vols disponibles</h3>
            <div>
                <select name="departs" id="vol_depart" onchange="prix(this)">
                    <?php foreach ($dispoVol as $vol) { ?>
                        <option value="<?= $vol["id_vol"]; ?>" id="<?= $vol["prix"]; ?>">
                            <?= $vol["ville_depart"] . "/" . $vol["ville_arrivee"];
                            ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div>
                <div>
                    <label for="passagers">Nombre de passagers</label>
                    <span id="moins">-</span>
                    <input type="number" value="1" id="passager" name="nb_passager"><span
                        id="plus">+</span>
                    <?php if (isset($_SESSION["passagers"])) { ?>
                        <p style="color:red;">
                            <?= $_SESSION["passagers"]; ?>
                        </p>
                    <?php }
                    unset($_SESSION["passagers"]); ?>
                </div>
                <div>
                    <label for="choix"> Choix du siège </label>
                    <select name="choix" id="choix">
                        <?php foreach ($listSieges as $siege) { ?>
                            <?php if ($siege["disponible"] == "disponible") { ?>
                                <option value="<?= $siege["id_siege"] ?>">
                                    <?= $siege["numero_siege"] ?>
                                </option>
                            <?php }
                        } ?>
                    </select>
                </div>
            </div>
            <div id="price"></div>
            <input type="submit" name="reserver" value="Reserver">
        </div>
    </form>
</section>
<script src="../assets/js/structure.js">
</script>