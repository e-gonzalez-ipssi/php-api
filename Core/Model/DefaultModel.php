<?php

namespace Core\Model;

use Core\Database\Database;

class DefaultModel extends Database
{
    protected string $table;
    protected string $entity;

    /**
     * Retour l'ensemble des éléments d'une table
     * 
     * @return array<int,object>
     */
    public function findAll(): array
    {
        try {
            $stmt = "SELECT * FROM $this->table;";
            $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, "App\Entity\\$this->entity");

            return $query->fetchAll();
        } catch (\PDOException $e) {
            header("content-type: application/json");
            header("http_response_code: 400");
            echo json_encode($e->getMessage());
        }
    }
}
