<?php

namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Article[] findAll()
 * @method Article find(int $id)
 * @method ?int saveArticle(array $article)
 */
final class ArticleModel extends DefaultModel
{
    protected string $table = "article";
    protected string $entity = "Article";

    /**
     * Ajoute un article a la database
     * 
     * @param array $article
     * @return ?int
     */
    public function saveArticle(array $article): ?int
    {
        $stmt = "INSERT INTO $this->table (title, content, categorie_id) VALUES (:title, :content, :categorie_id)";
        $prepare = $this->pdo->prepare($stmt);

        if ($prepare->execute($article)) {
            // récupéré l'id du dernier ajout a la bd
            return $this->pdo->lastInsertId($this->table);
        } else {
            $this->jsonResponse("Erreur lors de l'insersion d'un article", 400);
        }
    }
}
