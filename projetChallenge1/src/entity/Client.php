<?php

namespace App\Entity;



class Client extends Personne {
    private string $telephone;
    private array $commandes;

    public function __construct(string $nom="", string $prenom="", string $telephone="", int $id=0, string $login="", string $password="") {
        parent::__construct($nom, $prenom, $id, UserType::client, $login, $password);
        
        $this->telephone = $telephone;
        $this->commandes = [];

    }
    public function getTelephone(): string {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self {
        $this->telephone = $telephone;
        return $this;
    }

    public function getCommandes(): array {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self {
        $this->commandes[] = $commande;
        return $this;
    }


    
    public static function toObject(array $data): static {
        
        $client = new Client(
            $data['nom'] ?? '',
            $data['prenom'] ?? '',
            $data['telephone'] ?? '',
            $data['id'] ?? 0,
            $data['login'] ?? '',
            $data['password'] ?? ''
        );
        
       
        return $client;
    }
    
 

    public function toArray(): array {
        $data = parent::toArray();
        $data['telephone'] = $this->telephone;
        
        if (count($this->commandes) > 0) {
            $data['commandes'] = array_map(function(Commande $commande) {
                return $commande->getId();
            }, $this->commandes);
        }
        
        return $data;
    }

  

 
}