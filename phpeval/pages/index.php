<?php 
session_start();

include "../templates/header.php";
include "../includes/functions.php";

$pdo = connectToDB();
$products = fetchAllArticles();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>

<?php 

if(isset($_SESSION['utilisateur'])) {
    echo "<h3>Bienvenue, " . $_SESSION['utilisateur']['username'] . " !</h3>";
}

?>

<?php if(isset($_SESSION['utilisateur'])) { ?>
<h2>Ajouter un nouvel article</h2>
<form action="../actions/ajouter_article.php" method="post">
    <label for="titre">Titre :</label>
    <input type="text" id="titre" name="titre" required><br><br>
    <label for="prix">Prix :</label>
    <input type="text" id="prix" name="prix" required><br><br>
    <input type="submit" value="Ajouter">
</form>

<?php }?>


<?php 

foreach ($products as $product) {
    echo "<h2>" . $product['title'] . "<span style='font-size: 15px; margin-left: 10px;'>";
    
    if(isset($_SESSION['utilisateur'])) {
        echo "<form action='../actions/add_to_cart.php' method='post'>";
        echo "<input type='hidden' name='id' value='" . $product['id'] . "'>";
        echo "<input type='submit' value='Ajouter au panier'>";
        echo " | ";
        echo "<select name='quantity' id='quantity'>";
        for ($i = 1; $i <= 10; $i++) {
            echo "<option value='$i'>$i</option>";
        }
        echo "</select>";
        echo "</form>";
        echo " | ";
        echo "<a href='../actions/supprimer_article.php?id=" . $product['id'] . "'>Supprimer</a>";
        echo " | ";
    }
    
    echo "<a href='../pages/product.php?id=" . $product['id'] . "'>Voir plus ...</a>";
    echo "</span></h2>";
    echo "<p>Prix : " . $product['price'] . " €</p>";
}

?>
    
</body>
</html>
