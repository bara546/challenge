<?php

namespace App\Service;

use App\Entity\Client;
use App\Ripository\ClientRipository;
use Exception;

class ClientService
{
    private ClientRipository $clientRepository;

    public function __construct()
    {
        $this->clientRepository = new ClientRipository();
    }

    
  
    public function getAllClients(): array
    {
        try {
            return $this->clientRepository->findAll();
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des clients: " . $e->getMessage(), 0, $e);
        }
    }

}