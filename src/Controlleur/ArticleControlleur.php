<?php

namespace App\Controlleur;

use App\Model\ArticleModel;
use Core\Controller\DefaultControlleur;

class ArticleControlleur extends DefaultControlleur
{
    /**
     * Retoure la liste des catégories
     * 
     * @return void
     */
    public function index(): void
    {
        $model = new ArticleModel();
        $this->jsonResponse($model->findAll());
    }
}
