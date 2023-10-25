<?php include_once('./list_vol.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');

$delete = $_GET['delete'];

// Pour supprimer une liste de vol 

if (isset($_GET['delete'])) {
    $delete = htmlspecialchars($vol['id_vol']);

    Vols::supprimeVol($delete);
}

