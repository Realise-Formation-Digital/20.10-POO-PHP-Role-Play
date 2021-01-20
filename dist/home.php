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
            <p>Saraceni tamen nec amici nobis umquam nec hostes optandi, ultro citroque discursantes quicquid inveniri poterat momento temporis parvi vastabant milvorum rapacium similes, qui si praedam dispexerint celsius, volatu rapiunt celeri, aut nisi impetraverint, non inmorantur.</p>
            <hr>
            <p class="mb-0">Duplexque isdem diebus acciderat malum, quod et Theophilum insontem atrox interceperat casus, et Serenianus dignus exsecratione cunctorum, innoxius, modo non reclamante publico vigore, discessit.</p>
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