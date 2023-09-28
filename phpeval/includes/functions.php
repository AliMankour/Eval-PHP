<?php 

function connectToDB(): PDO
{
    try {
        $host = "localhost";
        $dbname = "php_eval";
        $username = "root";
        $pass = "";

        $pdo = new PDO(
            "mysql:host=$host;port=3306;dbname=$dbname",
            $username,
            $pass
        );

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;

    } catch (PDOException $e) {

        echo "Erreur : " . $e->getMessage();
    }
}

function fetchAllArticles(): array
{
    $pdo = connectToDB();

    $query = "SELECT * FROM product";
    $stmt = $pdo->query($query);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

function fetchArticleById($id) 
{

    $pdo = connectToDB();

    $stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->execute([$id]);

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    return $product;
}

function ajouterNouvelArticle($title, $price)
{
    $pdo = connectToDB();

    $stmt = $pdo->prepare("INSERT INTO product (title, price) VALUES (?, ?)");
    $stmt->execute([$title, $price]);
}

function supprimerArticle($id)
{
    $pdo = connectToDB();

    $stmt = $pdo->prepare("DELETE FROM product WHERE id = ?");
    $stmt->execute([$id]);
}

function enregistrerUtilisateur($identifiant, $mot_de_passe)
{
    $pdo = connectToDB();

    $stmt = $pdo->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->execute([$identifiant, $mot_de_passe]);
}

function verifierConnexion($identifiant, $mot_de_passe)
{
    $pdo = connectToDB();

    $stmt = $pdo->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->execute([$identifiant]);

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($utilisateur && password_verify($mot_de_passe, $utilisateur['password'])) {
        return $utilisateur;
    } else {
        return null;
    }
}


?>
