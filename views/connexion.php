<link rel="stylesheet" href="../assets/css/style.css">
<?php include_once('../public/header.php'); ?>
<section>
    <div>
        <form action="./traitement/action.php" method='post' id="formulaireCo">
            <div id='amail'>
                <label for="e-mail">Adresse Mail :</label>
                <input type="email" name='email' id="mail">
                <?php if (isset($_SESSION["erreur_vide"])) { ?>
                    <p>
                        <?= $_SESSION["erreur_vide"] ?>
                    </p>
                <?php } ?>
            </div>
            <div class="mdp" id='motpass'>
                <label for="mdp">Mot de passe:</label>
                <input type="password" name="mdp" id="mdp">
                <?php if (isset($_SESSION["erreur_vide"])) { ?>
                    <p>
                        <?= $_SESSION["erreur_vide"] ?>
                    </p>
                    <?php unset($_SESSION["erreur_vide"]); ?>
                <?php } ?>
            </div>
            <input type="submit" name="connexion" id='boutonco'>
        </form>
    </div>
</section>
<script src="../assets/js/structure.js"></script>
<?php include_once('../public/footer.php'); ?>