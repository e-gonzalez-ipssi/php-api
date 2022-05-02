<?php

use App\Model\CategorieModel;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";

$model = new CategorieModel();

header("content-type: application/json");

echo json_encode($model->findAll());
