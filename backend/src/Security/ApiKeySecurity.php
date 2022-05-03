<?php

namespace App\Security;

use App\Model\ClientModel;

class ApiKeySecurity
{
    public static function verifyApiKey(): bool
    {
        if (isset($_GET["apiKey"]) && !empty($_GET["apiKey"])) {
            $clientModel = new ClientModel();
            if ($clientModel->findByApiKey($_GET["apiKey"])) {
                return true;
            } else {
                http_response_code(403);
                echo json_encode("Vous n'avez pas les droits pour accéder à cette api");
            }
        } else {
            http_response_code(400);
            echo json_encode("apiKey manquante");
        }
        return false;
    }
}
