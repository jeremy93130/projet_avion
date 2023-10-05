<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');

class Vols
{

    public static function avions($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee)
    {

        // Connexion à la base de données :
        $db = Database::dbConnect();

        // Préparation de la requête : 
        $request = $db->prepare("INSERT INTO vols (heure_depart,heure_arrivee,date_depart,date_arrivee,ville_depart,ville_arrivee) VALUES (?,?,?,?,?,?)");

        // Execution de la requête :
        try {
            $request->execute(array($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee));
            header("Location: http://localhost/projet_avion/views/list_vol.php");
        } catch (PDOException $error) {
            echo $error->getMessage();
        }
    }


    public static function listVols()
    {
        $db = Database::dbConnect();

        // Préparation de la requête :
        $request = $db->prepare("SELECT * FROM vols");

        // executer la requête :
        try {
            $request->execute();
            $list = $request->fetchAll(PDO::FETCH_ASSOC);
            return $list;
        } catch (PDOException $error) {
            $error->getMessage();
        }
    }
}