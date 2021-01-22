<?php

// création du lien avec Base De Données
require '../config/database.php';

//Declaration de variables pour redirection de page
$id = $_GET["id"];

// On recherche la table Hero
$query = $pdo->query("SELECT * FROM Hero");
$hero = $query->fetch();
$idHero = $hero->id;

// On recherche l'id de l'arme équipée par le Hero
$query3 = $pdo->query("SELECT idWeapon FROM heroWeapon WHERE idHero = $idHero AND gear = 1");
$heroWeapon = $query3->fetch();
$weaponId = $heroWeapon->idWeapon;

// On recherche le nom de l'arme équipée par le Hero
$query4 = $pdo->query("SELECT * FROM Weapon WHERE id = $weaponId");
$weaponStat = $query4->fetch();

// On recherche les info du Vilain correspondant à son id
$query2 = $pdo->query("SELECT * FROM Vilain WHERE id = $id");
$vilain = $query2->fetch();

$vilainStrength = $vilain->strength;
$vilainStamina = $vilain->stamina;
$vilainHealth = $vilain->health;
$vilainPower = $vilainStrength + $vilainStamina;
$weaponStrength = $weaponStat->strength;
$weaponStamina = $weaponStat->stamina;
$heroStrength = $hero->strength;
$heroStamina = $hero->stamina;
$heroHealth = $hero->health;
$heroPower = $heroStrength + $heroStamina + $weaponStrength + $weaponStamina;

if ($vilainPower >= $heroPower) {

    $result1 = $vilainPower - $heroPower;
    $heroPv = $heroHealth - $result1;

    $req = $pdo->query("UPDATE Hero SET health = $heroPv");

    $query5 = $pdo->query('SELECT * FROM Hero');
    $hero = $query5->fetch();

    $heroHealth = $hero->health;

    if ($heroHealth <= 0) {

        header("location: ../../dist/index.php?page=over");
        exit;
    }
} elseif ($heroPower > $vilainPower) {

    $result2 = $heroPower - $vilainPower;
    $vilainPv = $vilainHealth - $result2;
    $heroXp = $hero->xp + 1;

    $req2 = $pdo->query("UPDATE Vilain SET health = $vilainPv WHERE id = $id");

    $req3 = $pdo->query("UPDATE Hero SET xp = $heroXp");

    $query2 = $pdo->query("SELECT * FROM Vilain WHERE id = $id");
    $vilain = $query2->fetch();

    $query6 = $pdo->query("SELECT * FROM Hero");
    $hero = $query6->fetch();

    $vilainHealth = $vilain->health;
    $vilainBitcoin = $vilain->bitcoin;
    $vilainIdWeapon = $vilain->idWeapon;
    $heroBitcoin = $hero->bitcoin;
    $heroId = $hero->id;
    $heroBitUpd = $heroBitcoin + $vilainBitcoin;

    if ($vilainHealth <= 0) {

        $pdo->query("INSERT INTO heroWeapon (idHero, idWeapon, gear) VALUES ('".$heroId."', '".$vilainIdWeapon."', '0')");
        $pdo->query("UPDATE Hero SET bitcoin = $heroBitUpd");
        $pdo->query("UPDATE Hero SET bitcoin = $heroBitUpd");
        $pdo->query("DELETE FROM Vilain WHERE id = $id");
    }
    unset($id);
}




header("location: nextPage.php");
