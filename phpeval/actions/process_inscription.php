<?php
session_start();

include "../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];

    // Hachez le mot de passe
    $password_hashed = password_hash($mot_de_passe, PASSWORD_BCRYPT);

    // Enregistrez l'utilisateur dans la base de données
    enregistrerUtilisateur($identifiant, $password_hashed);
}

header('Location: ../auth/login.php');
exit();
?>
