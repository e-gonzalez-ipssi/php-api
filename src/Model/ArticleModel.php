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

    /**
     * Update un article
     * 
     * @param int $id
     * @param array $article
     * 
     * @return bool
     * 
     */
    public function updateArticle(int $id, array $article): ?bool
    {
        $stmt = "UPDATE $this->table SET title=:title, content=:content, categorie_id=:categorie_id WHERE id=:id;";
        $prepare = $this->pdo->prepare($stmt);

        $title = htmlspecialchars($article["title"]);
        $prepare->bindParam(":title", $title);
        $content = htmlspecialchars($article["content"]);
        $prepare->bindParam(":content", $content);
        $prepare->bindParam(":categorie_id", $article["categorie_id"]);
        $prepare->bindParam(":id", $id);

        return $prepare->execute();
    }
}
