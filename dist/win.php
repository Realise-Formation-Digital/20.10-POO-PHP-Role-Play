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
            <h4 class="alert-heading">Congratulations, you win !</h4>
            <p>Tu as chassé et pourfendu tous les démons cachés dans les murs décrépis la cité d'Elmer.
                la lumière chasse ainsi les ténèbres et les derniers habitants rescapés reconstruisent les murs du joyau des hautes terres du royaume de Readigi !</p>
            <hr>
            <p class="mb-0">Les grands Monarques Dju-Lien, Frais-des rixes et Mahar-Koh, t'offrent en gage de gratitude les clés de la grande Ka'ha Feheteheria où tu prendras un repos bien mérité.</p>
        </div>
    </div>
    <br />
    <br />
    <br />
    <div class="row">
        <div class="col text-center">
            <form method="POST" action="../src/action/start.php">
                <button type="submit" class="btn btn-lg btn-success">Restart Game <i class="fas fa-dice"></i></button>
            </form>
        </div>
    </div>
</div>

<?php

// On affiche le footer
require 'templates/footer.php';

?>