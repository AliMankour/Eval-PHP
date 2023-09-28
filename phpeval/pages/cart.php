<?php
session_start();

include "../templates/header.php";
include "../includes/functions.php";

$pdo = connectToDB();
$cart_items = [];
$total_general = 0;

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $product_id => $quantity){
        $product = fetchArticleById($product_id);
        if($product){
            $product['quantity'] = $quantity;
            $product['total_price'] = $product['price'] * $quantity; // Calcul du prix total pour cet article
            $cart_items[] = $product;
            $total_general += $product['total_price']; // Ajouter le prix total de cet article au total général
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
</head>
<body>

<?php 

foreach ($cart_items as $product) {
    echo "<h2>" . $product['title'] . "<span style='font-size: 15px; margin-left: 10px;'>";
    echo "<p>Prix : " . $product['price'] . " €</p>";
    echo "<p>Quantité : " . $product['quantity'] . "</p>";
    echo "<p>Total : " . $product['total_price'] . " €</p>";
}

echo "<h2>Total général : " . $total_general . " €</h2>";

?>

<?php 

if(isset($_SESSION['utilisateur'])) {

?>

<form action="../actions/commander.php" method="post">
    <input type="submit" value="Commander">
</form>

<?php }?>

</body>
</html>
