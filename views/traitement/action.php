<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Utilisateurclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Volclass.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/projet_avion/models/Reserveclass.php');


if (isset($_POST['inscription'])) {
    $civilite = htmlspecialchars($_POST['genre']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    $naissance = htmlspecialchars($_POST['naissance']);
    $adresse = htmlspecialchars($_POST['adresse']);
    $postal = htmlspecialchars($_POST['postal']);
    $ville = htmlspecialchars($_POST['ville']);

    // Hashage du mdp :
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

    // appel de la fonction register :
    Utilisateur::register($civilite, $nom, $prenom, $email, $mdpHash, $naissance, $adresse, $postal, $ville);
}


if (isset($_POST['connexion'])) {
    $email = htmlspecialchars($_POST['email']);
    $mdp = htmlspecialchars($_POST['mdp']);
    // Appel de la fonction connexion : 
    Utilisateur::connexion($email, $mdp);

    if (empty($email) || empty($mdp)) {
        $_SESSION["erreur_vide"] = "Tous les champs doivent être remplis";
    }

}


if (isset($_POST["ajouter_vol"])) {
    $heure_depart = htmlspecialchars($_POST["heure_depart"]);
    $heure_arrivee = htmlspecialchars($_POST["heure_arrivee"]);
    $date_depart = htmlspecialchars($_POST["date_depart"]);
    $date_arrivee = htmlspecialchars($_POST["date_arrivee"]);
    $ville_depart = htmlspecialchars($_POST["ville_dep"]);
    $ville_arrivee = htmlspecialchars($_POST["ville_arr"]);
    $capacite = htmlspecialchars($_POST["capacite"]);

    Vols::avions($heure_depart, $heure_arrivee, $date_depart, $date_arrivee, $ville_depart, $ville_arrivee, $capacite);
}

if (isset($_POST["reserver"])) {
    $voyageur = htmlspecialchars($_POST["id_utilisateur"]);
    $id_vol = htmlspecialchars($_POST["departs"]);
    $passagers = htmlspecialchars($_POST["nb_passager"]);
    $siege = htmlspecialchars($_POST["siege"]);
    $depart = htmlspecialchars($_POST["depart_date"]);

    Reservation::reservation($id_vol,$voyageur,$passagers,$siege,$depart);    
}