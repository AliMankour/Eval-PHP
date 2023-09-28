<?php
session_start();

$links = [
    [
        'path' => "../pages/index.php",
        'text' => 'Accueil'
    ],
    [
        'path' => "../pages/cart.php",
        'text' => 'Panier'
    ]
];

if(isset($_SESSION['utilisateur'])) {
    $links[] = [
        'path' => "../auth/logout.php",
        'text' => 'Déconnexion'
    ];
} else {
    $links[] = [
        'path' => "../auth/login.php",
        'text' => 'Connexion'
    ];
    $links[] = [
        'path' => "../auth/register.php",
        'text' => 'Inscription'
    ];
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        html {
            color-scheme: dark;
        }
    </style>
</head>
<body>
<header>
    <nav>
        <ul>
            <?php foreach ($links as $link): ?>
                <li><a href="<?= $link['path'] ?>"><?= $link['text'] ?></a></li>
            <?php endforeach ?>
        </ul>
    </nav>
</header>
</body>
</html>
