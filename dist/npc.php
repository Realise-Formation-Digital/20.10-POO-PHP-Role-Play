<?php

// On affiche le header
require 'templates/gameHeader.php';

// On se connecte à la database
require '../src/config/database.php';

// On récupère la variable $id présente dans la méthode GET
$id = $_GET['id'];

// On recherche toutes les armes figurant dans la table npcWeapon qui correspondent à l'id du Npc
$query = $pdo->query("SELECT idWeapon FROM npcWeapon WHERE idNPC = $id");

$reqNpc = $pdo->query("SELECT npcName FROM NPC WHERE id = $id");
$itemNpc = $reqNpc->fetch();

?>

<div class="container">
    <br />
    <br />
    <br />
    <br />
    <div class="container">
        <div class="alert alert-warning text-center" role="alert">
            <span>
                <h5 class=""><?= $itemNpc->npcName ?> (NPC)</h5>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam unde qui non aliquid accusantium molestiae, nisi numquam minus ipsam natus, voluptas voluptatibus repudiandae? Quod eaque nulla porro iste dolores explicabo.

            </span>
        </div>
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
                            $req = $pdo->prepare("SELECT * FROM Weapon WHERE id = ?");
                            $req->execute([$item->idWeapon]);
                            $weapon = $req->fetch();

                            // Chaque champ est mis en forme dans un tableau
                            echo ("
                                    <tr>
                                    <th scope='row'>
                                    <div class='form-check'>
                                    <input class='form-check-input' type='radio' name='buyWeapon' id='$weapon->id' value='buyWeapon'>
                                    </div>
                                    </th>
                                    <td>$weapon->weaponName</td>
                                    <td>$weapon->strength</td>
                                    <td>$weapon->stamina</td>
                                    <td>$weapon->bitcoin</td>
                                    </tr>
                                ");
                        }

                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col text-center">
                        <form class="" method="POST" action="../src/action/nextPage.php?page=<?= $_GET['page'] . "&id=" . $_GET['id'] ?>">

                            <button type="button" class="btn btn-success mr-2">Buy <i class="fas fa-shopping-cart"></i></button>

                            <button type="submit" class="btn btn-danger">Cancel <i class="fas fa-times-circle"></i></button>
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