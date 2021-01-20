<?php

$pdo = new PDO('mysql:dbname=combatgentil_db;host=maria_db', 'CF', 'digital2021');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
