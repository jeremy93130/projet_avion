<?php require_once('../views/inc/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Reserveclass.php');
$id_utilisateur = isset($_GET["id_utilisateur"]) ? $_GET["id_utilisateur"] : null;
$listReservation = Reservation::reservationUtilisateur($id_utilisateur);
// var_dump($listReservation);
?>


<h2>Liste des vols passés et/ou à venir</h2>
<table class="listvol">
    <tr>
        <th>Nom/Prénom
        </th>
        <th>Date de départ
        </th>
        <th>Heure de départ
        </th>
        <th>Date d'arrivée
        </th>
        <th>
            Heure d'arrivée
        </th>
        <th>Siege reservé
        </th>
    </tr>

    <?php foreach ($listReservation as $reservation) { ?>

            <?php if ($reservation["date_depart"] < date("Y-m-d")) { ?>
                    <tr class="red_depart">
                        <td>
                            <?= $reservation["nom"]; ?>
                            <?= $reservation["prenom"]; ?>
                        </td>
                        <td>
                            <?= $reservation["date_depart"]; ?>
                        </td>
                        <td><?= $reservation['heure_depart'] ?>
                        </td>
                        <td><?= $reservation['date_arrivee'] ?></td>
                        <td><?= $reservation['heure_arrivee'] ?></td>
                        <td><?= $reservation['numero_siege'] ?></td>
                    </tr>
                    <?php } else { ?>
                    <tr>
                        <td>
                            <?= $reservation["nom"]; ?>
                            <?= $reservation["prenom"]; ?>
                        </td>
                        <td>
                            <?= $reservation["date_depart"]; ?>
                        </td>
                        <td><?= $reservation['heure_depart'] ?>
                    </td>
                        <td><?= $reservation['date_arrivee'] ?></td>
                        <td><?= $reservation['heure_arrivee'] ?></td>
                        <td><?= $reservation['numero_siege'] ?></td>


                        <td></td>
                    </tr>
            <?php }
    } ?>
    </table>


    <?php require_once("../views/inc/footer.php"); ?>

