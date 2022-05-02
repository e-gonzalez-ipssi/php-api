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
     * Get the value of title
     */
    public function getTitle(): String
    {
        return $this->title;
    }

    /*
     * Set the value of title
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /*
     * Get the value of content
     */
    public function getContent(): String
    {
        return $this->content;
    }

    /*
     * Set the value of content
     */
    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    /*
     * Get the value of categorie_id
     */
    public function getCategorieId(): int
    {
        return $this->categorie_id;
    }

    /*
     * Set the value of categorie_id
     */
    public function setCategorieId(int $categorie_id): self
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

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
