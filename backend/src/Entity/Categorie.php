<?php

namespace App\Entity;

use JsonSerializable;

class Categorie implements JsonSerializable
{
    // Uniquement pour php 
    // readonly met la propriété en lecture uniquement
    // private readonly int $id
    private int $id;
    private string $name;

    /*
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /*
     * Set the value of id
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /*
     * Get the value of name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /*
     * Set the value of name
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->getId(),
            "name" => $this->getName()
        ];
    }
}
