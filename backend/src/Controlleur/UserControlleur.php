<?php

namespace App\Controlleur;

use App\Model\UserModel;
use App\Security\JwTokenSecurity;
use Core\Controller\DefaultControlleur;

class UserControlleur extends DefaultControlleur
{
    private UserModel $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function signup(): void
    {
        if (isset($_POST["nom"], $_POST["prenom"], $_POST["email"], $_POST["telephone"], $_POST["password"])) {
            $user = $_POST;
            $user["password"] = password_hash($user["password"], PASSWORD_DEFAULT);
            $user["roles"] = json_encode([]);
            $lastId = $this->model->saveUser($user);
            $this->jsonResponse($this->model->find($lastId));
        }
    }

    public function login(array $userData): void
    {
        // vérifier qu'on a bien le password
        $user = $this->model->getUserByEmail($userData["email"]);

        if ($user) {
            if (password_verify($userData["password"], $user->getPassword())) {
                // génération du jwt token
                $this->jsonResponse((new JwTokenSecurity)->generateToken($user->jsonSerialize()));
            } else {
                $this->jsonResponse("Mot de passe incorrect", 400);
            }
        } else {
            $this->jsonResponse("Cet utilisateur n'éxiste pas", 400);
        }
    }
}
