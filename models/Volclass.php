<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');

class Vols
{

    public static function avions($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee, $capacite,$nom_compagnie)
    {

        // Connexion à la base de données :
        $db = Database::dbConnect();

        // Préparation de la requête : 
        $request = $db->prepare("INSERT INTO vols (heure_depart,heure_arrivee,date_depart,date_arrivee,ville_depart,ville_arrivee,capacite) VALUES (?,?,?,?,?,?,?)");

        // Execution de la requête :
        try {
            $request->execute(array($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee, $capacite));

            $request1 = $db->prepare("INSERT INTO compagnies (nom) VALUES (?)");
            try{
                $request1->execute(array($nom_compagnie));
                
                // $request1 = $db->prepare("INSERT INTO sieges (")
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            header("Location: http://localhost/projet_avion/views/admin/list_vol.php");
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

    public static function calculPrix($id_vol)
    {
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT prix FROM vols WHERE id=?");

        try{
            $request->execute(array($id_vol));
            $prix = $request->fetch(PDO::FETCH_ASSOC);
            return $prix;
        }catch(PDOException $e){
            $e->getMessage();
        }
    }
}
