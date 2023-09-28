<?php
session_start();

// Vider le panier
unset($_SESSION['cart']);

// Rediriger vers la page du panier
header('Location: ../pages/cart.php');
exit();
?>
