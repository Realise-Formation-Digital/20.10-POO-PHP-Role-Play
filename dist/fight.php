<?php

// On affiche le header
require 'templates/gameHeader.php';

// On se connecte à la database
require '../src/config/database.php';

// On récupère la variable $id présente dans la méthode GET
$id = $_GET['id'];

// On recherche toutes les propriétés figurant dans la table Vilain qui correspondent à l'id du Vilain
$query = $pdo->query("SELECT * FROM Vilain WHERE id = $id");

$Vilain = $query->fetch();
$idWeapon = $Vilain->idWeapon;
$query = $pdo->query("SELECT weaponName FROM Weapon WHERE id = $idWeapon");
$Weapon = $query->fetch();
?>

<div class="container">
    <br />
    <div class="container">
        <?php
        // On affiche le nom du Vilain et un texte de description
        require 'templates/vilainInfo.php';
        ?>
        <div class="card">
            <div class="card-header">

                <h5><?= $hero->heroName ?> VS <?= $Vilain->vilainName ?></h5>

            </div>
            <div class="card-body">
                <img style="border-top-left-radius:15px; border-top-right-radius:15px;" src="img/<?= $Vilain->image ?>.jpg" class="img-fluid" alt="<?= $Vilain->vilainName ?>">
                <div class="alert alert-secondary text-center" role="alert">
                    <span>
                        <span class="mx-4" title='XP'>
                            <i class="fas fa-star"></i>
                            <span><?= $Vilain->xp ?></span>
                        </span>
                        <span class="mx-4" title='Health'>
                            <i class="fas fa-heart"></i>
                            <span><?= $Vilain->health ?></span>
                        </span>
                        <span class="mx-4" title='Strength'>
                            <i class="fas fa-fist-raised"></i>
                            <span><?= $Vilain->strength ?></span>
                        </span>
                        <span class="mx-4" title='Stamina'>
                            <i class="fas fa-shield-alt"></i>
                            <span><?= $Vilain->stamina ?></span>
                        </span>
                        <span class="mx-4" title='Weapon'>
                            <i class="fas fa-magic"></i>
                            <span><?= $Weapon->weaponName ?></span>
                        </span>
                        <span class="mx-4" title='Bitcoin'>
                            <i class="fas fa-coins"></i>

                            <span><?= $Vilain->bitcoin ?></span>
                        </span>

                    </span>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">

                    <div class="col-6 text-right">
                        <form method="POST" action="../src/action/fight.php?id=<?= $id ?>">
                            <button type="submit" class="btn btn-success mr-2">Fight <i class="fas fa-heart-broken"></i></button>
                        </form>
                    </div>

                    <div class="col-6 text-left">
                        <form method="POST" action="../src/action/escape.php">
                            <button type="submit" class="btn btn-danger">Escape <i class="fas fa-running"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
    <br />
    <br />
</div>

<?php

// On affiche le footer
require 'templates/gameFooter.php';

?>