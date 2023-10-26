<?php require_once("../../public/header.php");
?>
<section>
    <div>
        <form action="../traitement/action.php" method='post'>
            <div>
                <label for="compagnie">Compagnie aérienne</label>
                <input type="text" name="compagnie">
            </div>
            <input type="submit" name="ajouter_compagnie" value="Ajouter la compagnie">
        </form>
    </div>
    <div></div>
</section>
<?php include_once('../../public/footer.php'); ?>
