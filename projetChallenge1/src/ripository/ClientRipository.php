<?php

namespace App\Ripository;

use PDO;
use PDOException;
use App\Core\Database;
use App\Entity\Client;

class ClientRipository
{
    private PDO $pdo;
    
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    public function findAll(): array
    {
        $query = "SELECT * FROM personne WHERE type = 'client'";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        
        $clients = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $client = Client::toObject($row);
            $clients[] = $client;
        }
        
        return $clients;
    }

    
    
}