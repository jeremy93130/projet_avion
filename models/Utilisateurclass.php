<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Database.php');
class Utilisateur
{
    public static function register($civilite, $nom, $prenom, $mail, $mdp, $naissance, $adresse, $ville, $codePostal)
    {

        $db = Database::dbConnect();

        // préparation requête :
        $request = $db->prepare('INSERT INTO utilisateurs (civilité,nom,prenom,email,mdp,date_de_naissance,adresse,code_postal,ville) VALUES (?,?,?,?,?,?,?,?,?)');

        // execution 
        try {
            $request->execute(array($civilite, $nom, $prenom, $mail, $mdp, $naissance, $adresse, $ville, $codePostal));
            header('Location: http://localhost/projet_avion/connexion.php');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function connexion($email, $mdp)
    {
        $db = Database::dbConnect();
        $request = $db->prepare('SELECT * FROM utilisateurs WHERE email = ?');

        try {
            $request->execute(array($email));
            $utilisateur = $request->fetch(PDO::FETCH_ASSOC);
            if (!empty($utilisateur)) {
                $_SESSION["erreur_message"] = "Mauvais e-mail";
                if (password_verify($mdp, $utilisateur['mdp'])) {
                    $_SESSION["id"] = $utilisateur['id_utilisateur'];
                    $_SESSION["prenom"] = $utilisateur['prenom'];
                    $_SESSION["role"] = $utilisateur["role"];
                    header("Location: http://localhost/projet_avion/index.php");
                } else {
                    $_SESSION["erreur_message"] = "mauvais mdp";
                    header("Location: http://localhost/projet_avion/views/connexion.php");
                }
            } else {
                header("Location: http://localhost/projet_avion/views/connexion.php");
            }
            return $utilisateur;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}
