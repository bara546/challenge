<?php

namespace App\Entity;

use App\Core\AbstractEntity;
class Paiement extends AbstractEntity {
    private int $id;
    private float $montant;
    private string $date;
    private Facture $facture;
    private Vendeur $vendeur;

    public function __construct(int $id, float $montant, string $date, Facture $facture, Vendeur $vendeur) {
        $this->id = $id;
        $this->montant = $montant;
        $this->date = $date;
        $this->facture = $facture;
        $this->vendeur = $vendeur;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function getMontant(): float {
        return $this->montant;
    }

    public function setMontant(float $montant): self {
        $this->montant = $montant;
        return $this;
    }

    public function getDate(): string {
        return $this->date;
    }

    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }

    public function getFacture(): Facture {
        return $this->facture;
    }

    public function setFacture(Facture $facture): self {
        $this->facture = $facture;
        return $this;
    }

    public function getVendeur(): Vendeur {
        return $this->vendeur;
    }

    public function setVendeur(Vendeur $vendeur): self {
        $this->vendeur = $vendeur;
        return $this;
    }

    
  
public static function toObject(array $data): static {
        $paiement = new Paiement(
            $data['id'] ?? 0,
            $data['montant'] ?? 0.0,
            $data['date'] ?? '',
            Facture::toObject($data['facture'] ?? []),
            Vendeur::toObject($data['vendeur'] ?? [])
        );

        return $paiement;
    }   

    public function toArray(): array {
        return [
            'id' => $this->getId(),
            'montant' => $this->getMontant(),
            'date' => $this->getDate(),
            'facture' => $this->getFacture()->toArray(),
            'vendeur' => $this->getVendeur()->toArray()
        ];
    }
   



}
