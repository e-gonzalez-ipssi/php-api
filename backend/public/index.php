<?php

use Core\Routeur\Routeur;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";
require ROOT . "/Core/Routeur/Routeur.php";

// header("Access-Control-Allow-Origin: http://127.0.0.1:8080");
header("Access-Control-Allow-Origin: *");

Routeur::routeur();
