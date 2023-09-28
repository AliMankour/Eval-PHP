<?php
session_start();

include "../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

    $utilisateur = verifierConnexion($identifiant, $mot_de_passe);

    if ($utilisateur) {
        $_SESSION['utilisateur'] = $utilisateur;
        header('Location: ../pages/index.php');
        exit();
    } else {
        echo "Identifiant ou mot de passe incorrect.";
    }
}
?>
