<?php

namespace App\Entity;

use JsonSerializable;

class Client implements JsonSerializable
{
    private int $id;
    private string $company;
    private string $apiKey;

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
    * Get the value of company
    */
    public function getCompany(): string
    {
        return $this->company;
    }

    /*
    * Set the value of company
    */
    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    /*
    * Get the value of apikey
    */
    public function getApikey(): string
    {
        return $this->apikey;
    }

    /*
    * Set the value of apikey
    */
    public function setApikey(string $apikey): self
    {
        $this->apikey = $apikey;

        return $this;
    }
    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "company" => $this->company,
            "apiKey" => $this->apiKey,
        ];
    }
}
