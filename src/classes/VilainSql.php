<?php

/**
 * VilainSql
 * 
 * Permet de créer des monstres et leur assigner une arme
 * 
 */
class VilainSql
{
    /**
     * _vilainName
     *
     * @var string
     */
    private $_vilainName;

    /**
     * _vilainXp
     *
     * @var int
     */
    private $_vilainXp;

    /**
     * _vilainStrength
     *
     * @var int
     */
    private $_vilainStrength;

    /**
     * _vilainStamina
     *
     * @var int
     */
    private $_vilainStamina;

    /**
     * _vilainBitcoin
     *
     * @var int
     */
    private $_vilainBitcoin;
    
    /**
     * _vilainImage
     *
     * @var mixed
     */
    private $_vilainImage;

    /**
     * _weaponName
     *
     * @var string
     */
    private $_weaponName;

    /**
     * _weaponStrength
     *
     * @var int
     */
    private $_weaponStrength;

    /**
     * _weaponStamina
     *
     * @var int
     */
    private $_weaponStamina;

    /**
     * _weaponBitcoin
     *
     * @var int
     */
    private $_weaponBitcoin;

    /**
     * __construct
     * 
     * On crée des nouveaux objets VilainSql(string, string) avec pour paramètres leur nom (string) et le nom de leur arme (string)
     *
     * @param  string $vilain
     * @param  string $weapon
     * @return void
     */
    public function __construct(string $vilain, string $weapon)
    {
        // On déclare la propriété $_vilainName    
        $this->_vilainName = $vilain;
        // On déclare la propriété $_vilainXp composée d'un entier aléatoire compris entre 1 et 50  
        $this->_vilainXp = rand(1, 50);
        // On déclare la propriété $_vilainStrength composée d'un entier aléatoire compris entre 1 et $_vilainXp    
        $this->_vilainStrength = rand(1, $this->_vilainXp);
        // On déclare la propriété $_vilainStamina composée d'un entier aléatoire compris entre 1 et $_vilainXp    
        $this->_vilainStamina = rand(1, $this->_vilainXp);
        // On déclare la propriété $_vilainBitcoin composée d'un entier aléatoire compris entre 0 et 50    
        $this->_vilainBitcoin = rand(0, 50);
        // On déclare la propriété $_vilainImage composée d'un entier aléatoire compris entre 3 et 8    
        $this->_vilainImage = rand(3, 14);
        // On déclare la propriété $_weaponName    
        $this->_weaponName = $weapon;
        // On déclare la propriété $_weaponStrength composée d'un entier aléatoire compris entre 1 et $_vilainXp    
        $this->_weaponStrength = rand(1, $this->_vilainXp);
        // On déclare la propriété $_weaponStamina composée d'un entier aléatoire compris entre 1 et $_vilainXp    
        $this->_weaponStamina = rand(1, $this->_vilainXp);
        // On déclare la propriété $_weaponBitcoin composée d'un entier aléatoire compris entre 5 et 50    
        $this->_weaponBitcoin = rand(5, 50);
    }

    /**
     * insertVilain
     * 
     * On fait appel à la méthode insertVilain() afin d'insérer nos objets VilainSql dans la database
     *
     * @return void
     */
    public function insertVilain()
    {
        // On se connecte à la database
        require '../config/database.php';

        // On ajoute des guillemets autour de la propriété $_weaponName afin de la rendre compatible avec la requête sql
        $weaponName = "'" . $this->_weaponName . "'";

        // On insère une arme dans la table Weapon
        $sqlWeapon = "INSERT INTO Weapon (weaponName, strength, stamina, bitcoin)
VALUES ($weaponName, $this->_weaponStrength, $this->_weaponStamina, $this->_weaponBitcoin)";
        $pdo->exec($sqlWeapon);

        //on récupère la valeur du champ id (primary keys) de la dernière arme insérée dans la table Weapon
        $idWeapon = $pdo->lastInsertId();

        // On ajoute des guillemets autour de la propriété $_vilainName afin de la rendre compatible avec la requête sql   
        $vilainName = "'" . $this->_vilainName . "'";

        // On insère un monstre dans la table Vilain
        $sqlVilain = "INSERT INTO Vilain (idWeapon, vilainName, xp, health, strength, stamina, bitcoin, image)
VALUES ($idWeapon, $vilainName, $this->_vilainXp, 10, $this->_vilainStrength, $this->_vilainStamina, $this->_vilainBitcoin, $this->_vilainImage)";
        $pdo->exec($sqlVilain);
    }
}
