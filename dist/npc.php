<?php

// On affiche le header
require 'templates/gameHeader.php';

// On se connecte à la database
require '../src/config/database.php';

// On récupère la variable $id présente dans la méthode GET
$id = $_GET['id'];
$page = $_GET['page'];

// On recherche la table Hero
$query7 = $pdo->query("SELECT bitcoin FROM Hero");
$hero = $query7->fetch();
$heroMoney = $hero->bitcoin;

// On recherche toutes les armes figurant dans la table npcWeapon qui correspondent à l'id du Npc
$query = $pdo->query("SELECT * FROM npcWeapon WHERE idNPC = $id");

$cancelUrl = "../src/action/nextPage.php?page=$page&id=$id";

?>

<div class="container">
    <br />
    <div class="container">
        <?php
        // On affiche le nom du Npc et un texte de description
        require 'templates/npcInfo.php';
        ?>
        <form method="POST" action="../src/action/buy.php?id=<?= $id ?>">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href=<?= "?page=npc&id=" . $_GET['id'] ?>>Buy</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=<?= "?page=sell&id=" . $_GET['id'] ?>>Sell</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Name</th>
                                <th scope="col" title='Strength'><i class="fas fa-fist-raised"></i></th>
                                <th scope="col" title='Stamina'><i class="fas fa-shield-alt"></i></th>
                                <th scope="col" title='Price'><i class="fas fa-coins"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            // On récupère les propriétés de toutes les armes présentes dans l'inventaire du Npc
                            foreach ($query as $item) {
                                $heroMoney = $hero->bitcoin;
                                $req2 = $pdo->prepare("SELECT * FROM Weapon WHERE id = ? AND bitcoin <= $heroMoney");


                                $req2->execute([$item->idWeapon]);
                                if ($req2->rowCount() != 0) {
                                    $weapon = $req2->fetch();
                                    $wCost = $weapon->bitcoin;
                                    $validate = true;

                                    // Chaque champ est mis en forme dans un tableau
                                    echo ("
                                        <tr>
                                        <th scope='row'>
                                        <div class='form-check'>
                                        <input class='form-check-input' type='radio' name='buyWeapon' id=$weapon->id value='$weapon->id' checked>
                                        </div>
                                        </th>
                                        <td>$weapon->weaponName</td>
                                        <td>$weapon->strength</td>
                                        <td>$weapon->stamina</td>
                                        <td>$wCost</td>
                                        </tr>
                                    ");
                                }
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-right">

                            <button type="submit" class="btn btn-success mr-2" <?php
                                                                                if ($validate != true) {
                                                                                    echo ('disabled');
                                                                                }
                                                                                ?>>Buy <i class="fas fa-shopping-cart"></i></button>

                        </div>
                        <div class="col-6 text-left">
                            <form method="POST" action="">
                                <button type="button" onclick="location.href='<?= $cancelUrl ?>'" class="btn btn-danger">Cancel <i class="fas fa-times-circle"></i></button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br />
</div>

<?php

// On affiche le footer
require 'templates/gameFooter.php';

?>