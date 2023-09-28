<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id']) && isset($_POST['quantity'])) {
        $product_id = $_POST['id'];
        $quantity = $_POST['quantity'];
        
        // Vérifier si le produit est déjà dans le panier
        if(isset($_SESSION['cart'][$product_id])) {
            // Si oui, ajouter la quantité
            $_SESSION['cart'][$product_id] += $quantity;
        } else {
            // Sinon, initialiser la quantité
            $_SESSION['cart'][$product_id] = $quantity;
        }
    }
    
    header('Location: ../pages/index.php');
    exit();
}
?>
