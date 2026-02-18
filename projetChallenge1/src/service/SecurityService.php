<?php
namespace App\Service;

use App\Ripository\PersonneRipository;

use App\Entity\Personne;
use Exception;
class SecurityService 
{
    private PersonneRipository $personneRipository;


    public function __construct(PersonneRipository $personneRipository){

        $this->personneRipository=$personneRipository;

    } 
  
   public function login(string $login, string $password): ?Personne
    {
        try {
            return $this->personneRipository->selectloginandpassword($login, $password);
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la connexion: " . $e->getMessage(), 0, $e);
        }
    }

    }



