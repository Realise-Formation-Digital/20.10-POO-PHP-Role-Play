<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon Svg -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">

    <title>Balsam Role Play</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <!-- Fontawesome -->
    <script src="https://kit.fontawesome.com/e0632129c8.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php

    // On récupère la variable $page présente dans la méthode GET
    // Si la réponse est correcte, on charge le contenu correspondant à la page mentionnée
    // Si la valeur est incorrecte on charge la page d'accueil (home.php)

    $page = 'home';

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    switch ($page) {
        case 'home':
            include 'home.php';
            break;
        case 'npc':
            // On récupère la variable $id présente dans la méthode GET
            // Si la réponse est correcte, on charge le contenu correspondant à l'id de la page npc.php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                include 'npc.php';
            } else {
                // Si la valeur est incorrecte on charge la page d'accueil (home.php)
                include 'home.php';
            }
            break;
        case 'sell':
            // On récupère la variable $id présente dans la méthode GET
            // Si la réponse est correcte, on charge le contenu correspondant à l'id de la page sell.php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                include 'sell.php';
            } else {
                // Si la valeur est incorrecte on charge la page d'accueil (home.php)
                include 'home.php';
            }
            break;
        case 'fight':
            // On récupère la variable $id présente dans la méthode GET
            // Si la réponse est correcte, on charge le contenu correspondant à l'id de la page fight.php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                include 'fight.php';
            } else {
                // Si la valeur est incorrecte on charge la page d'accueil (home.php)
                include 'home.php';
            }
            break;
        case 'win':
            include 'win.php';
            break;
        case 'over':
            include 'over.php';
            break;
        default:
            include 'home.php';
            break;
    }

    ?>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>