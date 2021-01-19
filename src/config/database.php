<?php

$pdo = new PDO('mysql:dbname=pooroleplay_db;host=localhost', 'user', 'user');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
