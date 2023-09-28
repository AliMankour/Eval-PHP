<?php
session_start();

include "../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $product_id = $_GET['id'];

    supprimerArticle($product_id);
}

header('Location: ../pages/index.php');
exit();
?>
