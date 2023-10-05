<link rel="stylesheet" href="../assets/css/style.css">
<?php require_once('./inc/header.php'); ?>

<section class="reservation">
    <form action="./traitement/action.php" method="post">
        <div>
            <h2>Où voulez vous partir?</h2>
        </div>
        <div>
            <label for="passagers">Nombre de passagers</label>
            <input type="number">
            <label for="passagers">Choix du siège</label>
            <input type="number">
        </div>
        <div>
            <label for="aeroport_depart">Aéroport de départ</label>
            <input type="text" placeholder="Aéroport de départ">
            <label for="aeroport_arrivee">Aéroport d'arrivée</label>
            <input type="text" placeholder="Aéroport d'arrivée">
        </div>
        <div>
            <label for="date">Date de départ</label>
            <input type="date">
        </div>
        <input type="submit" name="reserver" value="Reserver">
    </form>
</section>
<script src="../assets/js/structure.js"></script>