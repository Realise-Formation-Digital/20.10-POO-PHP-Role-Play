<?php

$deleteHero = "DELETE FROM Hero WHERE id > '0'";
$deleteHeroWeapon = "DELETE FROM heroWeapon WHERE id > '0'";
$deleteNpc = "DELETE FROM NPC WHERE id > '0'";
$deleteWeapon = "DELETE FROM Weapon WHERE id > '0'";
$deleteNpcWeapon = "DELETE FROM npcWeapon WHERE id > '0'";
$deleteVilain = "DELETE FROM Vilain WHERE id > '0'";

$pdo->exec($deleteHero);
$pdo->exec($deleteHeroWeapon);
$pdo->exec($deleteNpc);
$pdo->exec($deleteWeapon);
$pdo->exec($deleteNpcWeapon);
$pdo->exec($deleteVilain);

$sqlHero = "INSERT INTO Hero (heroName, xp, health, strength, stamina, bitcoin)
VALUES ('Mike', '1', '1', '1', '1', '1')";
$sqlNpc = "INSERT INTO NPC (npcName, xp)
VALUES ('John', '1')";
$sqlWeapon = "INSERT INTO Weapon (weaponName, strength, stamina, bitcoin)
VALUES ('Excalibur', '1', '1', '1')";
$sqlVilain = "INSERT INTO Vilain (vilainName, xp, health, strength, stamina, bitcoin)
VALUES ('Joker', '1', '1', '1', '1', '1')";

$pdo->exec($sqlHero);
$pdo->exec($sqlNpc);
$pdo->exec($sqlWeapon);
$pdo->exec($sqlVilain);

//SELECT Hero.id, Weapon.id FROM Hero JOIN Weapon ON Hero.id = heroWeapon.id;
