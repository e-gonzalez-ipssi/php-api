<?php

use App\Controlleur\CategorieControlleur;
use App\Controlleur\ArticleControlleur;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";

// (new CategorieControlleur)->index();
(new ArticleControlleur)->index();
