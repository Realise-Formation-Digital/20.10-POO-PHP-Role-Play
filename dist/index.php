<?php

require '../vendor/autoload.php';

$class = new App\Test();

$afficher = $class->test();

var_dump($afficher);
