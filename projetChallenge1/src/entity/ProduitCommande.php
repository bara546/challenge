<?php

namespace App\Entity;
use App\Core\AbstractEntity;

class ProduitCommande extends AbstractEntity {
    private int $id;
    private Produit $produit;
    private Commande $commande;
    private int $quantite;

    public function __construct(int $id,  int $quantite, Produit $produit, Commande $commande) {
        $this->id = $id;
        $this->quantite = $quantite;
        $this->produit = $produit;
        $this->commande = $commande;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getProduit(): Produit {
        return $this->produit;
    }

    public function setProduit(Produit $produit): self {
        $this->produit = $produit;
        return $this;
    }

    public function getCommande(): Commande {
        return $this->commande;
    }

    public function setCommande(Commande $commande): self {
        $this->commande = $commande;
        return $this;
    }

    public function getQuantite(): int {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self {
        $this->quantite = $quantite;
        return $this;
    }

 
  
    public static function toObject(array $data): static {
        $produitCommande = new ProduitCommande(
            $data['id'] ?? 0,
            $data['quantite'] ?? 0,
            $data['produit'] ?? null,
            $data['commande'] ?? null
        );
        
        if (isset($data['produit'])) {
            if ($data['produit'] instanceof Produit) {
                $produitCommande->setProduit($data['produit']);
            } elseif (is_array($data['produit'])) {
                $produit = Produit::toObject($data['produit']);
                $produitCommande->setProduit($produit);
            }
        }
        if (isset($data['commande'])) {
            if ($data['commande'] instanceof Commande) {
                $produitCommande->setCommande($data['commande']);
            } elseif (is_array($data['commande'])) {
                $commande = Commande::toObject($data['commande']);
                $produitCommande->setCommande($commande);
            }
        }
        
        return $produitCommande;
    }

    
   
    public function toArray(): array {
        return [
            'id' => $this->id,
            'produit' => $this->produit->toArray(),
            'commande' => $this->commande->toArray(),
            'quantite' => $this->quantite
        ];
    }
  

}
