<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');

class Reservation
{

    public static function reservation($vol_id, $utilisateur_id, $nombre_passagers, $choix_siege, $numero_vol)
    {

        // Connexion à la base de données :
        $db = Database::dbConnect();

        // Préparation de la requête : 
        $request = $db->prepare("INSERT INTO reservations (vol_id,utilisateur_id,nombre_passagers,choix_siege,numero_vol) VALUES (?,?,?,?,?)");

        // Execution de la requête :
        $request->execute(array($vol_id, $utilisateur_id, $nombre_passagers, $choix_siege, $numero_vol));
    }
}