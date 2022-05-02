<?php

namespace App\Controlleur;

use App\Model\CategorieModel;
use Core\Controller\DefaultControlleur;

class CategorieControlleur extends DefaultControlleur
{
    /**
     * Retoure la liste des catégories
     * 
     * @return void
     */
    public function index(): void
    {
        $model = new CategorieModel();
        $this->jsonResponse($model->findAll());
    }
}
