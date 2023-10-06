<?php require_once('../views/inc/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Reserveclass.php');
$id_utilisateur = isset($_GET["id_utilisateur"]) ? $_GET["id_utilisateur"] : null;
$listReservation = Reservation::reservationUtilisateur($id_utilisateur);
var_dump($listReservation);
?>


<h2>Liste des vols passés et/ou à venir</h2>
<table class="listvol">
    <tr>
        <th>Date de Départ </th>
        <th>Heure de départ </th>
        <th>Date d'arrivée </th>
        <th> Heure d'arrivée </th>
        <th>Ville de Départ </th>
        <th>Ville d'arrivée</th>
        <th>Compagnie Aérienne</th>
    </tr>

    <tr>
            <td>
                <?= $listReservation["id_reservations"] ?>
            </td>
            <td>
                <?= $listReservation["vol_id"] ?>
            </td>
            <td>
                <?= $listReservation["id_reservations"] ?>
            </td>
            <td>
                <?= $listReservation["id_reservations"] ?>
            </td>
            <td>

            </td>
            <td>

            </td>
</table>




<?php require_once("../views/inc/footer.php"); ?>