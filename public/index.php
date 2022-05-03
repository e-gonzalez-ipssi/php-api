<?php

use Core\Routeur\Routeur;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";
require ROOT . "/Core/Routeur/Routeur.php";

Routeur::routeur();
