<?php

namespace App\Model;

use Core\Model\DefaultModel;

/**
 * @method Categorie[] findAll()
 */
final class CategorieModel extends DefaultModel
{
    protected string $table = "categorie";
    protected string $entity = "Categorie";

    public function saveCategorie(array $categorie): ?int
    {
        $stmt = "INSERT INTO $this->table (name) VALUES (:name)";
        $prepare = $this->pdo->prepare($stmt);

        if ($prepare->execute($categorie)) {
            // récupéré l'id du dernier ajout a la bd
            return $this->pdo->lastInsertId($this->table);
        } else {
            $this->jsonResponse("Erreur lors de l'insersion d'une catégorie", 400);
        }
    }
}
