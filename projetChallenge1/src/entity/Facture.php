<?php

namespace App\Entity;
use App\Core\AbstractEntity;

class Facture extends AbstractEntity {
   private int $id;
   private string $date;
   private float $montant;
   private ?Commande $commande;
   private ?Statut $statut;
   private float $montantRestant;
   private array $paiements;

   public function __construct(
       int $id = 0, 
       string $date = '', 
       float $montant = 0.0,
       ?Statut $statut = null, 
       float $montantRestant = 0.0, 
       ?Commande $commande = null  
   ) {
        $this->id = $id;
        $this->date = $date;
        $this->montant = $montant;
        $this->statut = $statut ?? Statut::Impaye; 
        $this->montantRestant = $montantRestant;
        $this->paiements = [];
        $this->commande = $commande;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getMontant(): float {
        return $this->montant;
    }

    public function getCommande(): Commande {
        return $this->commande;
    }

    public function getStatut(): Statut {
        return $this->statut;
    }

    public function getMontantRestant(): float {
        return $this->montantRestant;
    }

    public function setId(int $id): self {
        $this->id = $id;
        return $this;
    }

    public function setMontant(float $montant): self {
        $this->montant = $montant;
        return $this;
    }

    public function setCommande(Commande $commande): self {
        $this->commande = $commande;
        return $this;
    }

    public function setStatut(Statut $statut): self {
        $this->statut = $statut;
        return $this;
    }

    public function setMontantRestant(float $montantRestant): self {
        $this->montantRestant = $montantRestant;
        return $this;
    }
    public function getPaiements(): array {
        return $this->paiements;
    }
    public function addPaiement(Paiement $paiement): self {
        $this->paiements[] = $paiement;
        return $this;
    }
    
    public static function toObject(array $data): static {
        return new static(
            $data['id'] ?? 0,
            $data['date'] ?? '',
            $data['montant'] ?? 0.0,
            isset($data['status']) ? Statut::from($data['status']) : null,
            $data['montantRestant'] ?? 0.0,
            $data['commande'] ?? null
        );
    }

    public function toArray(): array {
        $data = [
            'id' => $this->id,
            'montant' => $this->montant,
            'commande' => $this->commande->toArray(),
            'statut' => $this->statut->value,
            'montantRestant' => $this->montantRestant
        ];
        
        if (!empty($this->paiements)) {
            $paiementsArray = [];
            foreach ($this->paiements as $paiement) {
                $paiementsArray[] = $paiement->toArray();
            }
            $data['paiements'] = $paiementsArray;
        }
        
        return $data;
    }   

   


    public function getDate(): string {
        return $this->date;
    }
    public function setDate(string $date): self {
        $this->date = $date;
        return $this;
    }


}
