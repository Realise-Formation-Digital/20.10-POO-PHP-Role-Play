<?php

//Declaration de variables pour redirection de page
$page = $_GET["page"];
$pageSource = $_GET["id"];

// On se connecte à la database
require '../config/database.php';


//declaration de variable query
$query = $pdo->query("SELECT * FROM Hero");

$Hero = $query->fetch();

$coin = $Hero->bitcoin;

//Test conditionnel si argent > 100
if ($coin >= 100) {

    $strength = $Hero->strength + 1;

    $req = $pdo->query("UPDATE Hero SET strength = $strength");

    $bitcoin = $Hero->bitcoin - 100;

    $req1 = $pdo->query("UPDATE Hero SET bitcoin = $bitcoin");
}

header("location: ../../dist/index.php?page=$page&id=$pageSource");
