<?php


namespace App\Ripository;

use PDO;
use PDOException;
use App\Core\Database;
use App\Entity\Produit;
use App\Core\AbstracteRipository;

class ProduitRipository extends AbstracteRipository
{
  public function __construct() {
        parent::__construct(); 
    }
    public function findAll(): array
    {
        $query = "SELECT * FROM produit ORDER BY libelle";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        
        $produits = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $data = [
                'id' => $row['id'],
                'libelle' => $row['libelle'],
                'prix' => (float)$row['prix'],
                'quantiteStock' => (int)($row['quantite_stock'] ?? 0)
            ];
            
            $produit = Produit::toObject($data);
            $produits[] = $produit;
        }
        
        return $produits;
    }
}