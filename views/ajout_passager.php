<link rel="stylesheet" href="../assets/css/style.css">
<?php
require_once('../public/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Reserveclass.php');

?>

<section class="reservation">
    <form action="./traitement/action.php" method="post" class="voyageurs">
        <h2>Ajout voyageur</h2>
        <div>
            <label for="civilite_passager">Civilité</label>
            <select name="civilite_voyageur" id="civilite_passager">
                <option value="Mr">Monsieur</option>
                <option value="Mme">Madame</option>
            </select>
            <label for="nom_passager">Nom</label>
            <input type="text" name="voyageur_nom" id="nom_passager">
            <label for="prenom_passager">Prénom</label>
            <input type="text" name="voyageur_prenom" id="prenom_passager">
        </div>
        <div>
            <label for="email_passager">Email</label>
            <input type="email" name="voyageur_email" id="email_passager">
            <label for="naissance_passager">Date de naissance</label>
            <input type="date" name="voyageur_naissance" id="naissance_passager">
        </div>
        <div>
            <label for="adresse_passager">Adresse</label>
            <input type="text" name="voyageur_adresse" id="adresse_passager">
            <label for="postal_passager">Code Postal</label>
            <input type="number" name="voyageur_postal" id="postal_passager">
            <label for="ville_passager">Ville</label>
            <input type="text" name="voyageur_ville" id="ville_passager">
        </div>
        <input type="submit" name="add_voyageur" value="Ajout voyageur">
    </form>
</section>
<script src="../public/assets/js/structure.js"></script>

