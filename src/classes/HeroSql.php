<?php

/**
 * HeroSql
 * 
 * Permet de créer des heros et leur assigner une arme
 * 
 */
class HeroSql
{
    /**
     * _HeroName
     *
     * @var string
     */
    private $_heroName;

    /**
     * _weaponName
     *
     * @var string
     */
    private $_weaponName;

    /**
     * _weaponBitcoin
     *
     * @var int
     */
    private $_weaponBitcoin;

    /**
     * __construct
     * 
     * On crée des nouveaux objets HeroSql(string, string) avec pour paramètres leur nom (string) et le nom de leur arme (string)
     *
     * @param  string $hero
     * @param  string $weapon
     * @return void
     */
    public function __construct(string $hero, string $weapon)
    {
        // On déclare la propriété $_heroName    
        $this->_heroName = $hero;
        // On déclare la propriété $_weaponName    
        $this->_weaponName = $weapon;
        // On déclare la propriété $_weaponBitcoin composée d'un entier aléatoire compris entre 5 et 50    
        $this->_weaponBitcoin = rand(5, 50);
    }

    /**
     * insertHero
     * 
     * On fait appel à la méthode insertHero() afin d'insérer nos objets HeroSql dans la database
     *
     * @return void
     */
    public function insertHero()
    {
        // On se connecte à la database
        require '../config/database.php';

        // On ajoute des guillemets autour de la propriété $_weaponName afin de la rendre compatible avec la requête sql
        $weaponName = "'" . $this->_weaponName . "'";

        // On insère une arme dans la table Weapon
        $sqlWeapon = "INSERT INTO Weapon (weaponName, strength, stamina, bitcoin)
VALUES ($weaponName, 5, 5, $this->_weaponBitcoin)";
        $pdo->exec($sqlWeapon);

        //on récupère la valeur du champ id (primary keys) de la dernière arme insérée dans la table Weapon
        $idWeapon = $pdo->lastInsertId();

        // On ajoute des guillemets autour de la propriété $_heroName afin de la rendre compatible avec la requête sql   
        $heroName = "'" . $this->_heroName . "'";

        // On insère un personnage dans la table Hero

        $sqlHero = "INSERT INTO Hero (heroName, xp, health, strength, stamina, bitcoin, image)
VALUES ($heroName, 0, 10, 15, 15, 20, 1)";
        $pdo->exec($sqlHero);

        // On récupère la valeur du champ id (primary keys) du dernier personnage inséré dans la table Hero
        $idHero = $pdo->lastInsertId();

        // On insère les champs idHero et idWeapon (foreign keys) dans la table de liaison heroWeapon
        $sqlHeroWeapon = "INSERT INTO heroWeapon (idHero, idWeapon, gear) VALUES ($idHero, $idWeapon, true)";
        $pdo->exec($sqlHeroWeapon);
    }
}
