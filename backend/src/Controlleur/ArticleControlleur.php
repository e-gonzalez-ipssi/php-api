<?php

namespace App\Controlleur;

use App\Model\ArticleModel;
use Core\Controller\DefaultControlleur;

class ArticleControlleur extends DefaultControlleur
{
    private $model;

    public function __construct()
    {
        $this->model = new ArticleModel();
    }

    /**
     * Retoure la liste des articles
     * 
     * @return void
     */
    public function index(): void
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * Retourne l'article d'id donnée
     * 
     * @return void
     */
    public function single(int $id): void
    {
        $this->jsonResponse($this->model->find($id));
    }

    /**
     * Créer un nouvelle article
     * 
     * @param array $article
     * 
     * @return void
     */
    public function save(array $article): void
    {
        $lastId = $this->model->saveArticle($article);
        $this->jsonResponse($this->model->find($lastId));
    }

    /**
     * Update un article
     * 
     * @param int $id
     * @param array $article
     * 
     * @return void
     * 
     */
    public function update(int $id, array $article)
    {
        if ($this->model->updateArticle($id, $article)) {
            $this->jsonResponse($this->model->find($id), 201);
        }
    }

    /**
     * Delete un article
     * 
     * @param int $id
     * 
     * @return void
     * 
     */
    public function delete(int $id)
    {
        if ($this->model->delete($id)) {
            $this->jsonResponse("Article supprimée avec succès");
        }
    }
}
