<?php

// On récupère la variable $id présente dans la méthode GET
$id = $_GET['id'];

// On récupère le nom du Npc dans la database
$req = $pdo->query("SELECT vilainName FROM Vilain WHERE id = $id");
$item = $req->fetch();

?>
<div class="alert alert-warning text-center" role="alert">
    <span>
        <h5 class=""><?= $item->vilainName ?></h5>
        Tu te retrouves face à un redoutable adversaire. Te sens-tu assez valeureux pour chasser les forces de l'ombre de la cité d'Esmer, ou prendras-tu lâchement la fuite ?
    </span>
</div>