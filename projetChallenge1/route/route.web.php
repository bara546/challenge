<?php

use App\Controller\CommandeController;
use App\Controller\ErreurController;
use App\Controller\FactureController;
use App\Controller\SecuriteController;

return [
    '/' => ['controller' => SecuriteController::class, 'method' => 'login'],
    '/logout' => ['controller' => SecuriteController::class, 'method' => 'logout'],
    '/erreur' => ['controller' => ErreurController::class, 'method' => 'erreur404'],
    '/erreur403' => ['controller' => ErreurController::class, 'method' => 'erreur403'],

    '/lister' => [
        'controller' => CommandeController::class, 
        'method' => 'index',
        'middleware' => 'auth'
    ],
    
    '/form' => [
        'controller' => CommandeController::class, 
        'method' => 'create',
        'middleware' => ['auth', 'isVendeur']  
    ],
    
    '/passer' => [
        'controller' => CommandeController::class, 
        'method' => 'store',
        'middleware' => ['auth', 'isVendeur']
    ],
    
    '/mes-commandes' => [
        'controller' => CommandeController::class, 
        'method' => 'mesCommandes',
        'middleware' => ['auth', 'isClient']
    ],
    
    '/facture'=> [
        'controller' => FactureController::class, 
        'method' => 'show',
        'middleware' => 'auth'
    ],
];

