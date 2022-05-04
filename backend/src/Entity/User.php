<?php

namespace App\Entity;

use JsonSerializable;

class User implements JsonSerializable
{
    private int $id;
    private string $nom;
    private string $prenom;
    private string $email;
    private string $telephone;
    private string $password;
    private array|string $roles;

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
    * Get the value of nom
    */
    public function getNom(): string
    {
        return $this->nom;
    }

    /*
    * Set the value of nom
    */
    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /*
    * Get the value of prenom
    */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /*
    * Set the value of prenom
    */
    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /*
    * Get the value of email
    */
    public function getEmail(): string
    {
        return $this->email;
    }

    /*
    * Set the value of email
    */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /*
     * Get the value of phone
     */
    public function getTelephone(): string
    {
        return $this->telephone;
    }

    /*
     * Set the value of phone
     */
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /*
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /*
     * Set the value of password
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /*
     * Get the value of roles
     */
    public function getRoles(): array
    {
        if (is_string($this->roles)) {
            $this->roles = json_decode($this->roles);
        }
        $this->roles[] = "ROLE_USER";
        return $this->roles;
    }

    /*
     * Set the value of roles
     */
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function jsonSerialize(): mixed
    {
        return [
            "id" => $this->id,
            "nom" => $this->nom,
            "prenom" => $this->prenom,
            "email" => $this->email,
            "telephone" => $this->telephone,
            "roles" => $this->getRoles(),
        ];
    }
}
