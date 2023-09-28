<?php 

include "../templates/header.php";
include "../includes/functions.php";

$pdo = connectToDB();

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $product = fetchArticleById($id);

    if ($product) {
        echo "<h1>" . $product['title'] . "</h1>";
        echo "<p>Description: " . $product['description'] . "</p>";
        echo "<p>Plateforme: " . $product['plateform'] . "</p>";
        echo "<img src='" . $product['image'] . "' alt='" . $product['title'] . "'>";
        echo "<p>Sortie: " . $product['released_at'] . "</p>";
        echo "<p>Prix: " . $product['price'] . "</p>";
    } else {
        echo "Article non trouvé.";
    }
} else {
    echo "ID d'article non spécifié.";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>


    
</body>
</html>