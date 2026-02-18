<?php

namespace App\Entity;

use App\Core\AbstractEntity;
use DateTime;
class Commande  extends AbstractEntity{
    private int $id;
    private String $date;
    private ?Client $client;
    private ?Vendeur $vendeur;
    private ?Facture $facture;
    private array $produitsCommande = [];

    public function __construct(int $id=0, string $date='', Client $client=null , Vendeur $vendeur=null, Facture $facture=null  ) {
        $this->id = $id;
        $this->date = $date;
        $this->client = $client;
        $this->vendeur = $vendeur;
        $this->facture = $facture;
        $this->produitsCommande = [];
    }

  public function getVendeur(): ?Vendeur {
    return $this->vendeur;
}

    public function getId(): int {
        return $this->id;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }
public function getClient(): ?Client {
    return $this->client;
}

    public function setClient(Client $client): self {
        $this->client = $client;
        return $this;
    }

    public function setVendeur(Vendeur $vendeur): self {
        $this->vendeur = $vendeur;
        return $this;
    }
    
   public function getFacture(): ?Facture {
    return $this->facture;
}

    public function setFacture(Facture $facture): self {
        $this->facture = $facture;
        return $this;
    }
    public function getproduitsCommandeCommandeCommande(): array {
        return $this->produitsCommande;
    }
    public function addProduit(Produit $produit): self {
        $this->produitsCommande[] = $produit;
        return $this;
    }

    public static function toObject(array $data): static {
        $commande = new static(
            $data['id'] ?? 0,
            $data['date'] ?? '',
            $data['client'] ?? null,
            $data['vendeur'] ?? null,
            $data['facture'] ?? null
        );

        return $commande;
    }
    public function toArray(): array {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'client' => $this->client->toArray(),
            'vendeur' => $this->vendeur->toArray(),
            'facture' => $this->facture->toArray(),
            'produitsCommande' => array_map(fn($produit) => $produit->toArray(), $this->produitsCommande)
        ];
    }
   

}