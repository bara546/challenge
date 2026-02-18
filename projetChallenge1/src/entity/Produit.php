<?php


namespace App\Entity;

use App\Core\AbstractEntity;

class Produit extends AbstractEntity {
    private int $id;
    private string $libelle; 
    private float $prix;
    private int $quantiteStock;
    public function __construct(int $id, string $libelle, float $prix, int $quantiteStock) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->prix = $prix;
        $this->quantiteStock = $quantiteStock;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getLibelle(): string { 
        return $this->libelle;
    }

    public function getPrix(): float {
        return $this->prix;
    }

    public function getQuantiteStock(): int {
        return $this->quantiteStock;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function setLibelle(string $libelle): self { // Nouveau setter
        $this->libelle = $libelle;
        return $this;
    }

    public function setPrix(float $prix): self {
        $this->prix = $prix;
        return $this;
    }

    public function setQuantiteStock(int $quantiteStock): self {
        $this->quantiteStock = $quantiteStock;
        return $this;
    }

    public function __toString(): string {
        return "Produit ID: {$this->id}, Libellé: {$this->libelle}, Prix: {$this->prix}, Quantité en stock: {$this->quantiteStock}";
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'libelle' => $this->libelle,
            'prix' => $this->prix,
            'quantiteStock' => $this->quantiteStock
        ];
    }

    public static function toObject(array $data): static {
        return new static(
            $data['id'] ?? 0,
            $data['libelle'] ?? '',
            $data['prix'] ?? 0.0,
            $data['quantiteStock'] ?? 0
        );
    }
}