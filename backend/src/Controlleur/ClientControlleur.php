<?php

namespace App\Controlleur;

use Core\Controller\DefaultControlleur;
use App\Model\ClientModel;

final class ClientControlleur extends DefaultControlleur
{
    public function __construct()
    {
        $this->model = new ClientModel;
    }

    /**
     * Retourne la liste des clients
     * 
     * @return void
     */
    public function index(): void
    {
        $this->jsonResponse($this->model->findAll());
    }

    /**
     * Retourne le client d'id donnée
     * 
     * @param int $id
     * 
     * @return void
     */
    public function single(int $id): void
    {
        $this->jsonResponse($this->model->find($id));
    }

    public function save($client): void
    {
        $apiKey = md5(uniqid());
        $client["apiKey"] = $apiKey;
        $lastId = $this->model->saveClient($client);
        $this->jsonResponse($this->model->find($lastId));
    }
}
