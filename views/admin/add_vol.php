<?php
require_once("../../public/header.php");
require_once("../../Models/Compagnieclass.php");
$listCompagnie = Compagnie::compagnie();
?>
<section>
    <div>
        <form action="../traitement/action.php" method='post'>
            <div>
                <label for="d_depart">Date de départ :</label>
                <input type="date" name="date_depart" min="<?= date("D-m-y") ?>">
                <label for="d_arrivee">Date d'arrivée :</label>
                <input type="date" name="date_arrivee">
            </div>
            <div>
                <label for="h_depart">Heure de départ :</label>
                <input type="time" min="00:00" max="23:59" name="heure_depart">
                <label for="h_depart">Heure d'arrivée :</label>
                <input type="time" min="00:00" max="23:59" name="heure_arrivee">
            </div>
            <div>
                <label for="ville_depart">Ville de départ :</label>
                <input type="text" name="ville_dep">
                <label for="ville_arrivee">Ville d'arrivée :</label>
                <input type="text" name="ville_arr">
            </div>
            <div>
                <label for="capacite">Capacité</label>
                <input type="number" name="capacite">
                <label for="prix">Prix de base</label>
                <input type="number" name="prix" placeholder="Prix €">
                <label for="compagnie">Compagnie aérienne</label>
                <select name="compagnie_aerienne" id="compagnie_aerienne">
                    <?php foreach ($listCompagnie as $compagnie) { ?>
                            <option value="<?= $compagnie['id_compagnie'] ?>"><?= $compagnie['nom'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" name="ajouter_vol" value="Ajouter le vol">
        </form>
    </div>
    <div></div>
</section>
<?php include_once('../../public/footer.php'); ?>

