<?php 

include "../templates/header.php";

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

<h2>Connexion</h2>
<form action="../actions/process_connexion.php" method="post">
    <label for="identifiant">Identifiant :</label>
    <input type="text" id="identifiant" name="identifiant" required><br><br>
    <label for="mot_de_passe">Mot de passe :</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>
    <input type="submit" value="Se connecter">
</form>
    
</body>
</html>