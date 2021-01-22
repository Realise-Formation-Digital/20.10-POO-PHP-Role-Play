<?php

//Declaration de variables pour redirection de page
$page = $_GET["page"];
$pageSource = $_GET["id"];

// On se connecte à la database
require '../src/config/database.php';

// On recherche les points xp, le health, la strenght, le stamina and the bitcoin figurant dans la table hero.
$query = $pdo->query("SELECT * FROM Hero");
$hero = $query->fetch();
$coin = $hero->bitcoin;

$id = $hero->id;

// on recherche toutes les armes présentes dans l'inventaire du hero
$req1 = $pdo->query("SELECT idWeapon FROM heroWeapon WHERE idHero = $id AND gear = 0");

// On met à jour les points de strength et de stamina du hero en fonction de l'arme qu'il a équipé
$req2 = $pdo->query("SELECT idWeapon FROM heroWeapon WHERE idHero = $id AND gear = 1");
$activeWeapon = $req2->fetch();
$req3 = $pdo->prepare("SELECT * FROM Weapon WHERE id = ?");
$req3->execute([$activeWeapon->idWeapon]);
$weaponStat = $req3->fetch();
$weaponStrength = $weaponStat->strength;
$weaponStamina = $weaponStat->stamina;
$heroStrength = $weaponStrength + $hero->strength;
$heroStamina = $weaponStamina + $hero->stamina;


?>
<nav class="navbar navbar-dark bg-dark text-light sticky-top">
    <a title='Back to homepage' class="navbar-brand text-light" href="index.php">
        <img src="img/balsam_icon.svg" width="30" height="30" class="d-inline-block text-light align-top" alt="" loading="lazy">
        Balsam.ico
    </a>
    <span title='Hero'>
        <span style="position:relative">
            <img style="border-radius:100px;" src="img/<?= $hero->image ?>.jpg" height="50" width="100" alt="<?= $hero->heroName ?>">

            <h5><span style="position:absolute; top:0%; left:20%; opacity:60%" class="badge badge-dark">
                    <?= $hero->heroName ?>
                </span></h5>
        </span>
    </span>
    <span title='XP'>
        <i class="fas fa-star"></i>
        <span><?= $hero->xp ?></span>
    </span>
    <span title='Health'>
        <i class="fas fa-heart"></i>
        <span><?= $hero->health ?></span>
    </span>
    <span title='Strength'>
        <i class="fas fa-fist-raised"></i>
        <span><?= $heroStrength ?></span>
    </span>
    <span title='Stamina'>
        <i class="fas fa-shield-alt"></i>
        <span><?= $heroStamina ?></span>
    </span>
    <span title='Bitcoin'>
        <i class="fas fa-coins"></i>
        <span><?= $hero->bitcoin ?></span>
    </span>
    <div>
        <form method="POST" action="../src/action/gearWeapon.php?id=<?" .$pageSource."?>" class="form-inline">
            <div class="form-group">
                <select name="Weapons" class="form-control">
                    <?php
                    // On affiche le nom des armes du hero dans une liste afin de sélectionner celle qu'il veut équiper

                    $req = $pdo->prepare("SELECT * FROM Weapon WHERE id = ?");
                    $req->execute([$activeWeapon->idWeapon]);
                    $weapon = $req->fetch();

                    echo ('
                 <option name="' . $weapon->weaponName . '" value="' . $weapon->weaponName . '">' . $weapon->weaponName . '</option>
                  ');

                    // On affiche le nom des armes du hero dans une liste afin de sélectionner celle qu'il veut équiper
                    foreach ($req1 as $item) {
                        $req2 = $pdo->prepare("SELECT * FROM Weapon WHERE id = ?");
                        $req2->execute([$item->idWeapon]);
                        $weapon = $req2->fetch();

                        echo ('
                 <option name="' . $weapon->weaponName . '" value="' . $weapon->weaponName . '">' . $weapon->weaponName . '</option>
                  ');
                    }
                    ?>
                </select>
                <!-- On équipe une arme -->
                <button type="submit" name="submit" class="btn btn-info ml-2">OK</i></button>
            </div>
        </form>
    </div>
    <?php if ($coin >= 100) {
        // Boutons pour trade 100 bitcoin contre xp, strength, stamina
        $xpUrl = '../src/action/tradeXp.php?page=' . $page . '&id=' . $pageSource;
        $strengthUrl = '../src/action/tradeStrength.php?page=' . $page . '&id=' . $pageSource;
        $staminaUrl = '../src/action/tradeStamina.php?page=' . $page . '&id=' . $pageSource;
        echo ('
        <div>
        <span class="mr-4">Trade for 100 <i class="fas fa-coins"></i></span>
              <a href="' . $xpUrl . '"><button type="button" class="btn btn-info mr-1">1 <i class="fas fa-star"></i></button></a>
              <a href="' . $strengthUrl . '"><button type="button" class="btn btn-info mr-1">1 <i class="fas fa-fist-raised"></i></button></a>
              <a href="' . $staminaUrl . '"><button type="button" class="btn btn-info">1 <i class="fas fa-shield-alt"></i></button></a>
              </div>
           ');
    }
    ?>
</nav>