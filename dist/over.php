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
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Game over !</h4>
            <p>Nombreux sont ceux qui sont tombés au combat, que leurs noms et leurs actions soient connus des générations futures.</p>
            <hr>
            <p class="mb-0"><span>"... deinde ad excelsa sublatus, inter felices currit animas".</span></p>
            <!-- ensuite élevé au plus haut, il court parmis les âmes bienheureuses -->
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