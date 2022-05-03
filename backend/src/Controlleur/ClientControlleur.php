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

    public function save($client): void
    {
        $apiKey = md5(uniqid());
        $client["apiKey"] = $apiKey;
        $lastId = $this->model->saveClient($client);
        $this->jsonResponse($this->model->find($lastId));
    }
}
