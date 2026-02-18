<?php

namespace App\Entity;

use App\Core\AbstractEntity;

abstract class Personne extends AbstractEntity {
    protected int $id;
    protected string $nom;
    protected string $prenom;
     private string $login;
    private string $password;
    protected UserType $type;

    public function __construct(string $nom="", string $prenom="", int $id=0, UserType $type=UserType::client,string $login="", string $password="") {
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->type = $type;
        $this->login = $login;
        $this->password = $password;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPrenom(): string {
        return $this->prenom;
    }

    public function getType(): UserType {
        return $this->type;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

    public function setPrenom(string $prenom): self {
        $this->prenom = $prenom;
        return $this;
    }

    public function setType(UserType $type): self {
        $this->type = $type;
        return $this;
    }
    public function getLogin(): string {
        return $this->login;
    }
    public function setLogin(string $login): self {
        $this->login = $login;
        return $this;
    }
    public function getPassword(): string {
        return $this->password;
    }
    public function setPassword(string $password): self {
        $this
->password = $password;
        return $this;
    }
    

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'nom' => $this->getNom(),
            'prenom' => $this->getPrenom(),
            'type' => $this->getType()->value,
            'login' => $this->getLogin(),
            'password' => $this->getPassword()
        ];
    }

    public static function toObject(array $data): static {
        $type = isset($data['type']) ? UserType::from($data['type']) : UserType::client;
        
        $instance = new static(
            $data['nom'] ?? '',
            $data['prenom'] ?? '',
            $data['id'] ?? 0,
            $type
        );
        
        return $instance;
    }
}