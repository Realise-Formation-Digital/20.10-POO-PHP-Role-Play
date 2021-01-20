<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon Svg -->
    <link rel="icon" type="image/svg+xml" href="favicon.svg">

    <title>Balsam Role Play</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>