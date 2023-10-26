<link rel="stylesheet" href="../assets/css/style.css">
<?php include_once('../public/header.php'); ?>
<section>
    <div>
        <form action="./traitement/action.php" method='post' class="formuInscription">
            <div class="civility">
                <label for="civility">Civilité :</label>
                <div>
                    <input type="radio" value="Mme" name="genre" class="radio">
                    <label for="Mme">Mme</label>
                </div>
                <div>
                    <input type="radio" value="Mr" name="genre" class="radio">
                    <label for="Mr">Mr</label>
                </div>
            </div>
            <div class="nomprenom">
                <div>
                    <label for="nom">Nom :</label>
                    <input type="text" name="nom">
                </div>
                <div>
                    <label for="prenom">Prenom :</label>
                    <input name='prenom' type="text">
                </div>
                <div>
                    <label for="e-mail">Adresse Mail :</label>
                    <input type="email" name='email'>
                </div>
                <div class="datenaissance">
                    <label for="naissance">Date de naissance :</label>
                    <input type="date" name="naissance">
                </div>
                <div class="mdp">
                    <label for="mdp">Mot de passe:</label>
                    <input type="password" name="mdp">
                </div>
            </div>
            <div class="adresse">
                <div>
                    <label for="adresse">Adresse :</label>
                    <input type="text" name="adresse">
                </div>
                <div>
                    <label for="ville">ville :</label>
                    <input type="text" name="ville">
                </div>
                <div>
                    <label for="adresse">Code postal :</label>
                    <input type="number" name="postal">
                </div>
            </div>
            <input type="submit" name="inscription">
        </form>
    </div>
    <div></div>
</section>
<?php include_once('../public/footer.php'); ?>
