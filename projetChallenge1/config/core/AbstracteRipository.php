<?php
namespace App\Core;
use PDO;
use App\Core\Database;
class AbstracteRipository{
    protected PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
}


//quand une classe herite une classe de bas le contrstructeur de l'enfant ne peut appeler automatiquement le contructeur du parent
//on doit appeler le contructeur du parent dans le contructeur de l'enfant
//on utilise le mot cle parent::construct() pour appeler le contructeur du parent
//on peut aussi utiliser le mot cle self::construct() pour appeler le contructeur de la classe courante
//on peut aussi utiliser le mot cle static::construct() pour appeler le contructeur de la classe courante
//on peut aussi utiliser le mot cle __construct() pour appeler le contructeur de la classe courante
//on doit fait parent::__construct() pour appeler le contructeur du parent
//on doit faire self::__construct() pour appeler le contructeur de la classe courante
//on doit faire static::__construct() pour appeler le contructeur de la classe courante
//on doit faire __construct() pour appeler le contructeur de la classe courante