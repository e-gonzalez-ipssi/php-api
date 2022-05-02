<?php

namespace App\Controlleur;

use App\Model\CategorieModel;
use Core\Controller\DefaultControlleur;

final class CategorieControlleur extends DefaultControlleur
{
    private $model;

    public function __construct()
    {
        $this->model = new CategorieModel();
    }

    /**
     * Retourne la liste des catégories
     * 
     * @return void
     */
    public function index(): void
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * Retourne la catégorie d'id donnée
     * 
     * @return void
     */
    public function single(int $id): void
    {
        $this->jsonResponse($this->model->find($id));
    }
}
