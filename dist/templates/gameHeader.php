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

$req1 = $pdo->query("SELECT idWeapon FROM heroWeapon WHERE idHero = $id");

?>
<nav class="navbar navbar-dark bg-dark text-light fixed-top">
    <a title='Back to homepage' class="navbar-brand text-light" href="index.php">
        <img src="img/balsam_icon.svg" width="30" height="30" class="d-inline-block text-light align-top" alt="" loading="lazy">
        Balsam.ico
    </a>
    <span title='Hero'>
        <span><h5><?= $hero->heroName ?></h5></span>
        <img src="img/<?= $hero->image ?>.jpg" height="50" width="100" alt="<?= $hero->heroName ?>">
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
        <span><?= $hero->strength ?></span>
    </span>
    <span title='Stamina'>
        <i class="fas fa-shield-alt"></i>
        <span><?= $hero->stamina ?></span>
    </span>
    <span title='Bitcoin'>
        <i class="fas fa-coins"></i>
        <span><?= $hero->bitcoin ?></span>
    </span>
    <form class="form-inline">
        <div class="form-group">

            <?php
            foreach ($req1 as $item) {
                $req = $pdo->prepare("SELECT * FROM Weapon WHERE id = ?");
                $req->execute([$item->idWeapon]);
                $weapon = $req->fetch();

                echo ('<select class="form-control">
                 <option>' . $weapon->weaponName . '</option>
                  </select>');
            }
            ?>
            <button type="button" class="btn btn-info ml-2">OK <i class="fas fa-check-circle"></i></button>
        </div>
    </form>
    <?php if ($coin >= 100) {
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