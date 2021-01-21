<?php

// On récupère la variable $id présente dans la méthode GET
$id = $_GET['id'];

// On récupère le nom du Npc dans la database
$reqNpc = $pdo->query("SELECT npcName FROM NPC WHERE id = $id");
$itemNpc = $reqNpc->fetch();

?>
<div class="alert alert-warning text-center" role="alert">
    <span>
        <h5 class=""><?= $itemNpc->npcName ?></h5>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam unde qui non aliquid accusantium molestiae, nisi numquam minus ipsam natus, voluptas voluptatibus repudiandae? Quod eaque nulla porro iste dolores explicabo.

    </span>
</div>