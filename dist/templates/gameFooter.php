<?php
//	Compte toutes les enregistrements des tables
$nbHero = $pdo->query('select count(*) from Hero')->fetchColumn();
$nbNPC = $pdo->query('select count(*) from NPC')->fetchColumn();
$nbVilain = $pdo->query('select count(*) from Vilain')->fetchColumn();
$nbWeapon = $pdo->query('select count(*) from Weapon')->fetchColumn();
?>
<nav class="navbar navbar-dark bg-dark text-light fixed-bottom">
    <span class="navbar-text ml-4"><i class="fas fa-gamepad"></i>&nbsp;
        Realise Gaming 2021 &copy;
    </span>
    <span class="navbar-text">
        <span title='Hero' class="mr-4">
            <i class="fas fa-user-shield"></i>
            <span><? echo $nbHero; ?></span>
        </span>
        <span title='Npc' class="mr-4">
            <i class="fas fa-user-tag"></i>
            <span><? echo $nbNPC; ?></span>
        </span>
        <span title='Vilain' class="mr-4">
            <i class="fas fa-spider"></i>
            <span><? echo $nbVilain; ?></span>
        </span>
        <span title='Weapon' class="mr-4">
            <i class="fas fa-magic"></i>
            <span><? echo $nbWeapon; ?></span>
        </span>
    </span>
</nav>