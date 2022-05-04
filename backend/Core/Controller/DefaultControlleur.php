<?php

namespace Core\Controller;

use App\Security\JwTokenSecurity;
use Core\Traits\JsonTrait;

/**
 * @method void jsonResponse(mixed $data, int $code = 200) Envoie les données passées en paramêtre au format json
 */
class DefaultControlleur
{
    use JsonTrait;

    public function isGranted(string $role): ?bool
    {
        $user = (new JwTokenSecurity())->decodeToken();

        if (!in_array($role, $user["roles"])) {
            throw new \Exception("Vous n'avez pas les droits pour effectué cette opération", 403);
        }

        return true;
    }
}
