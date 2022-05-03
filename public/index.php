<?php

use App\Controlleur\CategorieControlleur;
use App\Controlleur\ArticleControlleur;

define("ROOT", dirname(__DIR__));
require ROOT . "/vendor/autoload.php";

// (new CategorieControlleur)->index();
// (new ArticleControlleur)->index();
// (new CategorieControlleur)->single(1);
// (new ArticleControlleur)->single(1);

if (isset($_SERVER["PATH_INFO"])) {
    $path = explode("/", $_SERVER["PATH_INFO"]);

    if (isset($path[1])) {
        $controlleurName = "App\Controlleur\\" . ucfirst($path[1]) . "Controlleur";
        $controlleur = new $controlleurName();

        $id = null;
        if (isset($path[2]) && is_numeric($path[2])) {
            $id = $path[2];
        }

        switch ($_SERVER["REQUEST_METHOD"]) {
            case 'GET':
                if ($id) {
                    $controlleur->single($id);
                } else {
                    $controlleur->index();
                }
                break;
            case 'POST':
                if (!empty($_POST)) {
                    $controlleur->save($_POST);
                } else {
                    throw new Exception("Donné manquante pour l'ajout en BDD", 400);
                }
                break;
            case 'PUT':
                parse_str(file_get_contents("php://input"), $_PUT);
                if ($id && !empty($_PUT)) {
                    $controlleur->update($id, $_PUT);
                } else {
                    throw new Exception("Erreur lors de la modification, il mannque des informations", 400);
                }
                break;
            case 'PATCH':
                parse_str(file_get_contents("php://input"), $_PATCH);
                if ($id && !empty($_PATCH)) {
                    $controlleur->update($id, $_PATCH);
                } else {
                    throw new Exception("Erreur lors de la modification, il mannque des informations", 400);
                }
                break;
            case 'DELETE':
                if ($id) {
                    $controlleur->delete($id);
                } else {
                    throw new Exception("ID manquant", 400);
                }
                break;
        };
    }
} else {
    throw new Exception("No route matched");
}
