<?php

// On affiche le header
require 'templates/header.php';

?>

<div class="container">
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Welcome</h4>
            <p>De tout temps, la cité d'Esmer ne connue que la paix,
            jusqu'à ce qu'un mal étrange ne transforma une partie de ses habitants en monstres sanguinaires
        n'ayant pour but que de chasser les être humains pour s'en nourrir.
        Comme à chaque époque troublée, des Héros se lèvent et mettent en jeu leur vie afin de sauver l'humanité.</p>
            <hr>
            <p class="mb-0">Vous qui désirez devenir Héro, que la terre vous soit légère et l'issue des combats favorable.
            "Ad impossibilia nemo tenitur".</p>
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col text-center">
            <form method="POST" action="../src/action/start.php">
                <button type="submit" class="btn btn-lg btn-success">Start Game <i class="fas fa-dice"></i></button>
            </form>
        </div>
    </div>
</div>

<?php

// On affiche le footer
require 'templates/footer.php';

?>