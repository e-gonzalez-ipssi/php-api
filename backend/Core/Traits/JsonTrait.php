<?php

namespace Core\Traits;

/**
 * @method void jsonResponse(mixed $data, int $code = 200) Envoie les données passées en paramêtre au format json
 */
trait JsonTrait
{
    protected function jsonResponse(mixed $data, int $code = 200): void
    {
        header("content-type: application/json");
        http_response_code($code);
        echo json_encode($data);
    }
}
