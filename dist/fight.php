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
$id = $Vilain->idWeapon;
$query = $pdo->query("SELECT weaponName FROM Weapon WHERE id = $id");
$Weapon = $query->fetch();
?>

<div class="container">
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <?php
        // On affiche le nom du Vilain et un texte de description
        require 'templates/vilainInfo.php';
        ?>
        <div class="card">
            <div class="card-header">

                <h5>Hero VS <?= $Vilain->vilainName ?></h5>
                <img src="img/<?= $Vilain->image ?>.jpg" class="img-fluid" alt="<?= $Vilain->vilainName ?>">
n
            </div>
            <div class="card-body">
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

                    <div class="col text-center">

                        <form class="" method="POST" action="../src/action/escape.php">



                            <button type="button" class="btn btn-success mr-2">Fight <i class="fas fa-heart-broken"></i></button>

                            <?php
                            $xp = $hero->xp; 
                            if ($xp >= 1) {
                                echo ('
                            <button type="submit" class="btn btn-danger">Escape <i class="fas fa-running"></i></button>
                            ');
                            }
                            ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
</div>

<?php

// On affiche le footer
require 'templates/gameFooter.php';

?>