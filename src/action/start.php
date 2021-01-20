<?php

// On vérifie que la méthode de requête du serveur est en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // On se connecte à la database
    require_once '../config/database.php';

    // On désactive la vérification des clés étrangères (évite les conflits avec les tables de liaison)
    $constraintFalse = "SET FOREIGN_KEY_CHECKS = 0";
    $pdo->exec($constraintFalse);

    // On supprime tous les champs des tables existantes (remise à zéro des données dans la database)
    $deleteHero = "TRUNCATE TABLE Hero";
    $pdo->exec($deleteHero);
    $deleteNpc = "TRUNCATE TABLE NPC";
    $pdo->exec($deleteNpc);
    $deleteWeapon = "TRUNCATE TABLE Weapon";
    $pdo->exec($deleteWeapon);
    $deleteVilain = "TRUNCATE TABLE Vilain";
    $pdo->exec($deleteVilain);
    $deleteHeroWeapon = "TRUNCATE TABLE heroWeapon";
    $pdo->exec($deleteHeroWeapon);
    $deleteNpcWeapon = "TRUNCATE TABLE npcWeapon";
    $pdo->exec($deleteNpcWeapon);

    // On réactive la vérification des clés étrangères
    $constraintTrue = "SET FOREIGN_KEY_CHECKS = 1";
    $pdo->exec($constraintTrue);

    // On indique le chemin d'accès vers la classe HeroSql.php
    require '../classes/HeroSql.php';

    // On crée un nouvel objet HeroSql(string, string) avec pour paramètres son nom (string) et le nom de son arme (string)
    $hero1 = new HeroSql('Arthur', 'Excalibur');

    // On fait appel à la méthode insertHero() afin d'insérer notre objet HeroSql() dans la database
    $hero1->insertHero();

    // On indique le chemin d'accès vers la classe NpcSql.php
    require '../classes/NpcSql.php';

    // On crée un nouvel objet NpcSql(string, string) avec pour paramètres son nom (string) et le nom de son arme (string)
    $npc1 = new NpcSql('Merlin', 'Daydream');
    $npc2 = new NpcSql('Amrul', 'Frostmourne Sword');
    $npc3 = new NpcSql('Ganesh', 'Doomshadow');
    $npc4 = new NpcSql('Sagun', 'Nethersong');
    $npc5 = new NpcSql('Suyash', 'Crystal of Redemption');

    // On fait appel à la méthode insertNpc() afin d'insérer notre objet NpcSql() dans la database
    $npc1->insertNpc();
    $npc2->insertNpc();
    $npc3->insertNpc();
    $npc4->insertNpc();
    $npc5->insertNpc();

    // On fait appel à la méthode statique addNpcWeapon(int, string) afin d'ajouter une arme à un Npc
    // On utilise le premier attribut (int) pour récupérer l'id du Npc et le second attribut (string) pour nommer notre arme.
    NpcSql::addNpcWeapon($npc1->npcId, 'Baton of Fools');
    NpcSql::addNpcWeapon($npc1->npcId, 'Pact of Eternal Rest');
    NpcSql::addNpcWeapon($npc1->npcId, 'Windsong Globule');
    NpcSql::addNpcWeapon($npc1->npcId, 'Primal Aspect');
    NpcSql::addNpcWeapon($npc2->npcId, 'Judgement Torch');
    NpcSql::addNpcWeapon($npc2->npcId, 'Scorchvine');
    NpcSql::addNpcWeapon($npc2->npcId, 'Soulflare');
    NpcSql::addNpcWeapon($npc2->npcId, 'Deluge');
    NpcSql::addNpcWeapon($npc3->npcId, 'Firestorm Heart');
    NpcSql::addNpcWeapon($npc3->npcId, 'Oath of Widows');
    NpcSql::addNpcWeapon($npc3->npcId, 'Protector of Thunder');
    NpcSql::addNpcWeapon($npc3->npcId, 'Flamestone');
    NpcSql::addNpcWeapon($npc4->npcId, 'Netherbane');
    NpcSql::addNpcWeapon($npc4->npcId, 'Eye of the Damned');
    NpcSql::addNpcWeapon($npc4->npcId, 'Bruiser of Holy Might');
    NpcSql::addNpcWeapon($npc4->npcId, 'Dire Charm');
    NpcSql::addNpcWeapon($npc5->npcId, 'Celestia');
    NpcSql::addNpcWeapon($npc5->npcId, 'Furious Cudgel');
    NpcSql::addNpcWeapon($npc5->npcId, 'Hope of the Moon');
    NpcSql::addNpcWeapon($npc5->npcId, 'Defender of Hatred');

    // On indique le chemin d'accès vers la classe VilainSql.php
    require '../classes/VilainSql.php';

    // On crée un nouvel objet VilainSql(string, string) avec pour paramètres son nom (string) et le nom de son arme (string)
    $vilain1 = new VilainSql('Virus Mage', 'Dawnbreaker');
    $vilain2 = new VilainSql('Rad Burn', 'Abyssal Shard');
    $vilain3 = new VilainSql('Dark Vader', 'Lightsaber');
    $vilain4 = new VilainSql('Dirt Rot', 'Destroyer of Dragonsouls');
    $vilain5 = new VilainSql('Bite Gut', 'Copper Shortsword');

    // On fait appel à la méthode insertVilain() afin d'insérer notre objet VilainSql() dans la database
    $vilain1->insertVilain();
    $vilain2->insertVilain();
    $vilain3->insertVilain();
    $vilain4->insertVilain();
    $vilain5->insertVilain();

    // On redirige l'utilisateur vers la page suivante
    require 'nextPage.php';
}
