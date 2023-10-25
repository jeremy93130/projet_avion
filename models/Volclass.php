<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');

class Vols
{

    public static function avions($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee, $capacite, $prix, $nom_compagnie)
    {

        // Connexion à la base de données :
        $db = Database::dbConnect();

        // Préparation de la requête : 
        $request1 = $db->prepare("INSERT INTO compagnies (nom) VALUES (?)");


        // Execution de la requête :
        try {
            $request1->execute(array($nom_compagnie));
            $compagnieId = $db->lastInsertId();
            try {
                $request = $db->prepare("INSERT INTO vols (heure_depart,heure_arrivee,date_depart,date_arrivee,ville_depart,ville_arrivee,capacite,prix,compagnie_id) VALUES (?,?,?,?,?,?,?,?,?)");

                $request->execute(array($heureDepart, $heureArrivee, $date_depart, $date_arrivee, $villeDepart, $villeArrivee, $capacite, $prix, $compagnieId));
                // $request1 = $db->prepare("INSERT INTO sieges (")
            } catch (PDOException $e) {
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
        $request = $db->prepare("SELECT vols.*, compagnies.nom AS nom_compagnie
                        FROM vols
                        INNER JOIN compagnies ON vols.compagnie_id = compagnies.id_compagnie");

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

        try {
            $request->execute(array($id_vol));
            $prix = $request->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id_vol'] = $prix['id_vol'];
            return $prix;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public static function supprimeVol($id_vol)
    {
        $db = Database::dbConnect();

        $request = $db->prepare('DELETE FROM vols WHERE id_vol=?');

        try {
            $request->execute(array($id_vol));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
