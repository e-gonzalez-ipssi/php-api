<?php

namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Categorie[] findAll()
 * @method Categorie find(int $id)
 * @method ?int saveCategorie(array $categorie)
 */
final class CategorieModel extends DefaultModel
{
    protected string $table = "categorie";
    protected string $entity = "Categorie";

    /**
     * Ajoute une catégorie a la database
     * 
     * @param array $categorie
     * 
     * @return ?int
     */
    public function saveCategorie(array $categorie): int|false
    {
        $stmt = "INSERT INTO $this->table (name) VALUES (:name)";
        $prepare = $this->pdo->prepare($stmt);

        $name = htmlspecialchars($categorie["name"]);
        $prepare->bindParam(":name", $name);

        if ($prepare->execute()) {
            // récupéré l'id du dernier ajout a la bd
            return $this->pdo->lastInsertId($this->table);
        }
        return false;
    }

    /**
     * Update une catégorie
     * 
     * @param int $id
     * @param array $categorie
     * 
     * @return bool
     * 
     */
    public function updateCategorie(int $id, array $categorie): ?bool
    {
        $stmt = "UPDATE $this->table SET name=:name WHERE id=:id;";
        $prepare = $this->pdo->prepare($stmt);

        $name = htmlspecialchars($categorie["name"]);
        $prepare->bindParam(":name", $name);
        $prepare->bindParam(":id", $id);

        return $prepare->execute();
    }
}
