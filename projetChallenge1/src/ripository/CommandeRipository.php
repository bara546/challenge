<?php
namespace App\Ripository;

use App\Entity\Commande;
use App\Entity\Client;
use App\Entity\Vendeur;
use App\Entity\Facture;
use App\Core\Database;
use PDO;
use PDOException;
use App\Core\AbstracteRipository;

class CommandeRipository extends AbstracteRipository
{
    public function __construct() {
        parent::__construct(); 
    }

    public function findAll(): array
    {
        $query = "
            SELECT 
                c.id as commande_id, 
                c.date, 
                cli.id as client_id, 
                cli.nom as client_nom, 
                cli.prenom as client_prenom, 
                cli.telephone as client_telephone,
                v.id as vendeur_id, 
                v.nom as vendeur_nom, 
                v.prenom as vendeur_prenom,
                facture.id as facture_id,
                facture.status as facture_status
            FROM commande c
            JOIN personne cli ON c.client_id = cli.id
            JOIN personne v ON c.vendeur_id = v.id
            JOIN facture ON c.id = facture.commande_id
            ORDER BY c.date DESC
        ";
        
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        
        $commandes = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $client = Client::toObject([
                'nom' => $row['client_nom'] ?? '',
                'prenom' => $row['client_prenom'] ?? '',
                'telephone' => $row['client_telephone'] ?? '',
                'id' => $row['client_id'] ?? 0
            ]);
            
            $vendeur = Vendeur::toObject([
                'nom' => $row['vendeur_nom'] ?? '',
                'prenom' => $row['vendeur_prenom'] ?? '',
                'id' => $row['vendeur_id'] ?? 0
            ]);
            
            $facture = null;
            if (isset($row['facture_id']) && $row['facture_id']) {
                $facture = Facture::toObject([
                    'id' => $row['facture_id'],
                    'status' => $row['facture_status'] ?? ''
                ]);
            }
            
            $commande = Commande::toObject([
                'id' => $row['commande_id'],
                'date' => $row['date'],
                'client' => $client,
                'vendeur' => $vendeur,
            ]);
            
            $commandes[] = $commande;
        }
        
        return $commandes;
    }

    public function findByClient(int $clientId): array
    {
        $query = "
            SELECT 
                c.id as commande_id, 
                c.date, 
                cli.id as client_id, 
                cli.nom as client_nom, 
                cli.prenom as client_prenom, 
                cli.telephone as client_telephone,
                v.id as vendeur_id, 
                v.nom as vendeur_nom, 
                v.prenom as vendeur_prenom,
                facture.id as facture_id,
                facture.status as facture_status
            FROM commande c
             JOIN personne cli ON c.client_id = cli.id
            JOIN personne v ON c.vendeur_id = v.id
             JOIN facture ON c.id = facture.commande_id
            WHERE c.client_id = :clientId
            ORDER BY c.date DESC
        ";
        
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':clientId', $clientId, PDO::PARAM_INT);
        $statement->execute();
        
        $commandes = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $client = Client::toObject([
                'nom' => $row['client_nom'] ?? '',
                'prenom' => $row['client_prenom'] ?? '',
                'telephone' => $row['client_telephone'] ?? '',
                'id' => $row['client_id'] ?? 0
            ]);
            
            $vendeur = Vendeur::toObject([
                'nom' => $row['vendeur_nom'] ?? '',
                'prenom' => $row['vendeur_prenom'] ?? '',
                'id' => $row['vendeur_id'] ?? 0
            ]);
            
            $facture = null;
            if (isset($row['facture_id']) && $row['facture_id']) {
                $facture = Facture::toObject([
                    'id' => $row['facture_id'],
                    'status' => $row['facture_status'] ?? ''
                ]);
            }
            
            $commande = Commande::toObject([
                'id' => $row['commande_id'],
                'date' => $row['date'],
                'client' => $client,
                'vendeur' => $vendeur,
                'facture' => $facture
            ]);
            
           $commandes[] = $commande;
        }
        
        return $commandes;
    }


}