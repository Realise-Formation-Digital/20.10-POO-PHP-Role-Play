<?php

/**
 * NpcSql
 * 
 * Permet de créer des personnages non joueur (NPC) et leur assigner des armes à vendre
 * 
 */
class NpcSql
{
    /**
     * npcId
     *
     * @var int
     */
    public $npcId;

    /**
     * _npcName
     *
     * @var string
     */
    private $_npcName;

    /**
     * _npcXp
     *
     * @var int
     */
    private $_npcXp;

    /**
     * _weaponId
     *
     * @var int
     */
    private $_weaponId;

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
     * On crée des nouveaux objets NpcSql(string, string) avec pour paramètres leur nom (string) et le nom de leur arme (string)
     *
     * @param  string $npc
     * @param  string $weapon
     * @return void
     */
    public function __construct(string $npc, string $weapon)
    {
        // On déclare la propriété $_npcName    
        $this->_npcName = $npc;
        // On déclare la propriété $_npcXp composée d'un entier aléatoire compris entre 1 et 50  
        $this->_npcXp = rand(1, 50);
        // On déclare la propriété $_weaponName    
        $this->_weaponName = $weapon;
        // On déclare la propriété $_weaponStrength composée d'un entier proportionnel à la valeur de $_npcXp    
        $this->_weaponStrength = $this->_npcXp;
        // On déclare la propriété $_weaponStamina composée d'un entier proportionnel à la valeur de $_npcXp    
        $this->_weaponStamina = $this->_npcXp;
        // On déclare la propriété $_weaponBitcoin composée d'un entier aléatoire compris entre 5 et 50    
        $this->_weaponBitcoin = rand(5, 50);
    }

    /**
     * insertNpc
     * 
     * On fait appel à la méthode insertNpc() afin d'insérer nos objets NpcSql dans la database
     *
     * @return void
     */
    public function insertNpc()
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
        $this->_weaponId = $pdo->lastInsertId();

        // On ajoute des guillemets autour de la propriété $_npcName afin de la rendre compatible avec la requête sql   
        $npcName = "'" . $this->_npcName . "'";

        // On insère un monstre dans la table Npc
        $sqlNpc = "INSERT INTO NPC ( npcName, xp)
VALUES ($npcName, $this->_npcXp)";
        $pdo->exec($sqlNpc);

        //on récupère  la valeur du champ id (primary keys) du dernier personnage inséré dans la table NPC
        $this->npcId = $pdo->lastInsertId();

        // On insère les champs idNpc et idWeapon (foreign keys) dans la table de liaison npcWeapon
        $sqlNpcWeapon = "INSERT INTO npcWeapon (idNpc, idWeapon) VALUES ($this->npcId, $this->_weaponId)";
        $pdo->exec($sqlNpcWeapon);
    }

    /**
     * addNpcWeapon
     * 
     * On fait appel à la méthode statique addNpcWeapon(int, string) afin d'ajouter une arme à un Npc
     * On utilise l'attribut $npcId (int) pour récupérer l'id du Npc et $weapon (string) pour nommer notre arme.
     *
     * @return void
     */
    public static function addNpcWeapon(int $npcId, string $weapon)
    {
        // On déclare la propriété $_weaponName    
        $weaponName = $weapon;
        // On déclare la propriété $random composée d'un entier aléatoire compris entre 1 et 50  
        $random = rand(1, 50);
        // On déclare la propriété $weaponStrength composée d'un entier proportionnel à la valeur de $random    
        $weaponStrength = $random;
        // On déclare la propriété $weaponStamina composée d'un entier proportionnel à la valeur de $random    
        $weaponStamina = $random;
        // On déclare la propriété $weaponBitcoin composée d'un entier aléatoire compris entre 5 et 50    
        $weaponBitcoin = rand(5, 50);

        // On se connecte à la database
        require '../config/database.php';

        // On ajoute des guillemets autour de la propriété $name afin de la rendre compatible avec la requête sql
        $weaponName = "'" . $weaponName . "'";

        // On insère une arme dans la table Weapon
        $sqlWeapon = "INSERT INTO Weapon (weaponName, strength, stamina, bitcoin)
VALUES ($weaponName, $weaponStrength, $weaponStamina, $weaponBitcoin)";
        $pdo->exec($sqlWeapon);

        //on récupère la valeur du champ id (primary keys) de la dernière arme insérée dans la table Weapon
        $weaponId = $pdo->lastInsertId();

        // On insère les champs idNpc et idWeapon (foreign keys) dans la table de liaison npcWeapon
        $sqlNpcWeapon = "INSERT INTO npcWeapon (idNpc, idWeapon) VALUES ($npcId, $weaponId)";
        $pdo->exec($sqlNpcWeapon);
    }
}
