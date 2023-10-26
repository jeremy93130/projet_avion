<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');
class Compagnie
{
    public static function compagnie()
    {
        $db = Database::dbConnect();

        $request = $db->prepare("SELECT * FROM compagnies");

        try {
            $request->execute();
            $compagnie = $request->fetchAll(PDO::FETCH_ASSOC);
            return $compagnie;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public static function addCompagnie($nom)
    {
        $db = Database::dbConnect();

        $request = $db->prepare("INSERT INTO compagnies (nom) VALUES (?)");

        try {
            $request->execute(array($nom));
            header("Location: http://localhost/projet_avion/views/admin/add_vol.php");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
