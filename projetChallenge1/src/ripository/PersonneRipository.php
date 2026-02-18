<?php


namespace App\Ripository;
use App\Entity\Personne;
use App\Entity\Client;
use App\Entity\Vendeur;
use PDO;
use PDOException;
use App\Core\Database;
use App\Core\AbstracteRipository;

class PersonneRipository extends AbstracteRipository
{

  public function __construct() {
        parent::__construct(); 
    }

    public function selectloginandpassword($login, $password): ?Personne
    {
        $query = "SELECT * FROM personne WHERE login = :login AND password = :password";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':login', $login);
        $statement->bindParam(':password', $password);
        $statement->execute();

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $type = $row['type'] ?? '';
            if ($type == 'vendeur') {
                return Vendeur::toObject($row);
            } 

            if ($type == 'client') {
                return Client::toObject($row);
            } 
        }
        return null;
    }
}


?>