<?php

// On se connecte à la database
require '../config/database.php';

$query5 = $pdo->query('SELECT * FROM Hero');
$hero = $query5->fetch();

$heroXp = $hero->xp;

if ($heroXp >= 50) {

    header("location: ../../dist/index.php?page=win");
    exit;
}

// On ajoute une condition afin de spécifier l'id d'un personnage aléatoire présent dans la table Vilain
$query = $pdo->query('SELECT id FROM Vilain ORDER BY id DESC');

foreach ($query as $page) {

    $minId = $page->id;
}

$nbId = $minId;

if ($nbId == 0) {

    header('Location: ../../dist/index.php?page=win');
} else {

    // On déclare la variable $random composée d'un entier aléatoire compris entre 0 et 1
    $random = rand(0, 1);

    // Si la valeur de $random est égale à 0, on redirige l'utilisateur vers la page npc.php
    if ($random == '0') {

        // On ajoute une condition afin de spécifier l'id d'un personnage aléatoire présent dans la table NPC
        $query = $pdo->query('SELECT id FROM NPC ORDER BY id DESC');

        foreach ($query as $page) {

            $minId = $page->id;
        }

        $query = $pdo->query('SELECT id FROM NPC ORDER BY id ASC');

        foreach ($query as $page) {

            $maxId = $page->id;
        }

        $id = rand($minId, $maxId);

        header('Location: ../../dist/index.php?page=npc&id=' . $id);
        exit;
    }

    // Si la valeur de $random est égale à 1, on redirige l'utilisateur vers la page fight.php
    else if ($random == '1') {

        // On ajoute une condition afin de spécifier l'id d'un personnage aléatoire présent dans la table Vilain
        $query = $pdo->query('SELECT id FROM Vilain ORDER BY id DESC');

        foreach ($query as $page) {

            $minId = $page->id;
        }

        $query = $pdo->query('SELECT id FROM Vilain ORDER BY id ASC');

        foreach ($query as $page) {

            $maxId = $page->id;
        }

        $nbId = rand($minId, $maxId);

        $query = $pdo->query("SELECT * FROM Vilain WHERE id = $nbId");
        if ($query->rowCount() != 0) {
            header('Location: ../../dist/index.php?page=fight&id=' . $nbId);
        } else {
            header('Location: nextPage.php');
        }


        exit;
    }
}
