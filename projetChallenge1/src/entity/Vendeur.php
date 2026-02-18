<?php

//require_once 'Personne.php';
namespace App\Entity;

use App\Core\AbstractEntity;
class Vendeur extends Personne {
        private $matricule;
       
        private array $commandes;
        private array $paiements;

    public function __construct($nom="", $prenom="", $matricule="", $login="", $password="") {
        parent::__construct($nom, $prenom);
        $this->matricule = $matricule;
      
        $this->commandes = [];
        $this->paiements = [];
        $this->setType(UserType::vendeur);
    }

    public function getMatricule() {
        return $this->matricule;
    }

    public function setMatricule($matricule) {
        $this->matricule = $matricule;
        return $this;
    }

      public function getCommandes(): array {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): self {
        $this->commandes[] = $commande;
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
    $vendeur = new static(
        $data['nom'] ?? '',
        $data['prenom'] ?? '',
        $data['matricule'] ?? '',
        $data['login'] ?? '',
        $data['password'] ?? ''
    );
    
    if (isset($data['id'])) {
        $vendeur->setId($data['id']);
    }
    
    return $vendeur;
}
        
    public function getType(): UserType {
        return $this->type;
    }

    public function setType(UserType $type): self {
        $this->type = $type;
        return $this;
    }

    public function toArray(): array {
        $data = parent::toArray();
        $data['matricule'] = $this->matricule;
        
        if (count($this->commandes) > 0) {
            $commandeIds = [];
            foreach ($this->commandes as $commande) {
                $commandeIds[] = $commande->toArray();
            }
            $data['commandes'] = $commandeIds;
        }
        
        if (count($this->paiements) > 0) {
            $paiementIds = [];
            foreach ($this->paiements as $paiement) {
                $paiementIds[] = $paiement->toArray();
            }
            $data['paiements'] = $paiementIds;
        }
        
        return $data;

    }
 

}