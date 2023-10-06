<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');

class Reservation
{

    public static function reservation($vol_id, $utilisateur_id, $nombre_passagers, $choix_siege)
    {

        // Connexion à la base de données :
        $db = Database::dbConnect();

        // Préparation de la requête : 
        $request = $db->prepare("INSERT INTO reservations (vol_id,utilisateur_id,nombre_passagers,siege_id) VALUES (?,?,?,?)");

        // Execution de la requête :
        try {
            if ($nombre_passagers > 0) {
                $request->execute(array($vol_id, $utilisateur_id, $nombre_passagers, $choix_siege));

                $request = $db->prepare("UPDATE sieges SET disponible = 'reservé' WHERE id_siege = ?");
                try {
                    $request->execute(array($choix_siege));
                } catch (PDOException $e) {
                    $e->getMessage();
                }
            } else {
                $_SESSION["passagers"] = "Merci de renseigner le nombre de passagers";
                header("Location: http://localhost/projet_avion/views/reservation.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }


    public static function reservationUtilisateur($id_utilisateur)
    {
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT * FROM reservations WHERE utilisateur_id = ?");

        try {
            $request->execute(array($id_utilisateur));
            $reservation = $request->fetch();
            return $reservation;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public static function choixSieges()
    {
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT * FROM sieges WHERE disponible = 'disponible'");

        try {
            $request->execute();
            $list = $request->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}