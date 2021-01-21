<?php

// création du lien avec Base De Données
require '../config/database.php';

//declaration de variable query
$query = $pdo->query("SELECT * FROM Hero");

$Hero = $query->fetch();

$xp = $Hero->xp;

//Test conditionnel si xp > 1

if ($xp >= 1) {

    $xp = $Hero->xp - 1;

    $req = $pdo->query("UPDATE Hero SET xp = $xp");
}

header("location: nextPage.php");
