<?php
session_start();

include "../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $prix = $_POST['prix'];

    ajouterNouvelArticle($titre, $prix);
}

header('Location: ../pages/index.php');
exit();
?>