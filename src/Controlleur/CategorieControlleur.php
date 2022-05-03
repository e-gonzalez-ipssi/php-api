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
     * @param int $id
     * 
     * @return void
     */
    public function single(int $id): void
    {
        $this->jsonResponse($this->model->find($id));
    }

    /**
     * Créer une nouvelle catégorie
     * 
     * @param array $categorie
     * 
     * @return void
     */
    public function save(array $categorie): void
    {
        $lastId = $this->model->saveCategorie($categorie);
        $this->jsonResponse($this->model->find($lastId));
    }

    /**
     * Update une catégorie
     * 
     * @param int $id
     * @param array $categorie
     * 
     * @return void
     * 
     */
    public function update(int $id, array $categorie)
    {
        if ($this->model->updateCategorie($id, $categorie)) {
            $this->jsonResponse($this->model->find($id), 201);
        }
    }
}
