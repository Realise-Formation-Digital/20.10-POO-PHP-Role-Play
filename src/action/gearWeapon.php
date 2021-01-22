<?php

// Initialisation Base de données
require '../config/database.php';

$pageSource = $_GET["id"];

$query = $pdo->query("SELECT * FROM Hero");
$hero = $query->fetch();

$id1 = $hero->id;

$selected_val = $_POST['Weapons'];  // Sauvegarde de la valeur en variable

// Recherche de l'arme 
$stmt = $pdo->prepare("SELECT * FROM Weapon WHERE weaponName = ?");
$stmt->execute([$selected_val]); 
$id = $stmt->fetch();

// Mise à jour de la base donnée gear/ungear weapon
$sql02 = $pdo->query("UPDATE heroWeapon SET gear = '1' WHERE idHero = $id1 AND idWeapon = $id->id ");
$sql03 = $pdo->query("UPDATE heroWeapon SET gear = '0' WHERE idHero = $id1 AND gear = '1' AND idWeapon <> $id->id ");


header('Location: ' . $_SERVER['HTTP_REFERER']);

