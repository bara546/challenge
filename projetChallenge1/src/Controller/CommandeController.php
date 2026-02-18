<?php

namespace App\Controller;
use App\Core\AbstracteController;
use App\Ripository\CommandeRipository;
use App\Service\CommandeService;
use App\Core\Session;
class CommandeController extends AbstracteController
{
    private CommandeService $commandeService;

    public function __construct()
    {
        $commandeRepository = new CommandeRipository();
        $this->commandeService = new CommandeService($commandeRepository);
    }

    function create() {
        $this->render('commande/form');
    }
    
    function edit() {
    
    }

    function destroy() {

    }
    
    function show() {

    }
    
    function store() {
        header('Location: http://localhost:8000/facture');
        exit();
    }
    
    function update() {

    }
    
    public function index()
    {
        try {
            $commandes = $this->commandeService->getAllCommandes();
            
            $this->render('commande/Lister', ['commandes' => $commandes]);
        } catch (\Exception $e) {
           
            $this->render('commande/Lister', ['error' => $e->getMessage()]);
        }
    }
   
    public function mesCommandes()
    {
        $session =Session::getInstance();
        if (!$session->isset('user')) {  
            header('Location: /');
            exit();
        }
        
        $user = $session->get('user');
        $clientId = $user['id'];
        
        try {
            $commandes = $this->commandeService->getCommandesByClient($clientId);
            
            $this->render('commande/mes_commandes', [
                'commandes' => $commandes
            ]);
        } catch (\Exception $e) {
            $this->render('commande/mes_commandes', [
                'error' => "Une erreur est survenue lors de la récupération de vos commandes: " . $e->getMessage()
            ]);
        }
    }
}