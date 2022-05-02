<?php

use App\Controlleur\CategorieControlleur;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";

(new CategorieControlleur)->index();
