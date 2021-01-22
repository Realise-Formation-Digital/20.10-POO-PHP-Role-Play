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
        Une âme solitaire et mystérieuse te propose d'acquérir une arme contre quelques pièces d'or.
    </span>
</div>