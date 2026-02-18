<?php

namespace App\Service;

use App\Ripository\CommandeRipository;
use Exception;

class CommandeService
{
    private CommandeRipository $commandeRepository;

    public function __construct(CommandeRipository $commandeRepository)
    {
        $this->commandeRepository = $commandeRepository;
    }

    public function getAllCommandes(): array
    {
        try {
            return $this->commandeRepository->findAll();
            
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des commandes: " . $e->getMessage(), 0, $e);
        }
    }


    public function getCommandesByClient(int $clientId): array
    {
        try {
            return $this->commandeRepository->findByClient($clientId);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la récupération des commandes du client: " . $e->getMessage(), 0, $e);
        }
    }
}
