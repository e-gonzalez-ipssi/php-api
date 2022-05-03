<?php

namespace App\Model;

use App\Entity\Client;
use Core\Model\DefaultModel;

class ClientModel extends DefaultModel
{
    protected string $table = "client";
    protected string $entity = "Client";


    public function saveClient(array $client)
    {
        $stmt = "INSERT INTO $this->table (company, apiKey) VALUES (:company, :apiKey)";
        $prepare = $this->pdo->prepare($stmt);
        if ($prepare->execute($client)) {
            return $this->pdo->lastInsertId($this->table);
        }
        return false;
    }

    public function findByApiKey($apiKey): Client|false
    {
        $stmt = "SELECT * FROM $this->table WHERE apiKey='$apiKey'";
        $query = $this->pdo->query($stmt, \PDO::FETCH_CLASS, "App\\Entity\\$this->entity");
        return $query->fetch();
    }
}
