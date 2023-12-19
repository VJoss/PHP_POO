<?php
require_once ('Heros.php');
require_once ('Barbare.php');
require_once ('Roublard.php');


$michou = new Roublard("Jean Michelz");
$bernard = new Barbare("Bernard Michelz");




$bernard->infosBarbare();

$michou->infosRoublard();