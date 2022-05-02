<?php

namespace App\Entity;

use JsonSerializable;

class Article implements JsonSerializable
{
    // Uniquement pour php 
    // readonly met la propriété en lecture uniquement
    // private readonly int $id
    private int $id;
    private string $title;
    private string $content;
    private int $categorie_id;

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "name" => $this->title,
            "content" => $this->content,
            "categorie_id" => $this->categorie_id
        ];
    }
}
