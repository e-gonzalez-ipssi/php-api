<?php

namespace Core\Controller;

use Core\Traits\JsonTrait;

/**
 * @method void jsonResponse(mixed $data, int $code = 200) Envoie les données passées en paramêtre au format json
 */
class DefaultControlleur
{
    use JsonTrait;
}
