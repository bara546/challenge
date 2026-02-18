<?php
namespace App\Controller;
use Exception;
use App\Core\Validator;
use App\Entity\Personne;
use App\Service\SecurityService;
use App\Core\AbstracteController;
use App\Ripository\PersonneRipository;

class SecuriteController extends AbstracteController
{
    private SecurityService $securityService;

    public function __construct()
    {
        parent::__construct();
        
        $this->layout = 'securite';
        $personneRepository = new PersonneRipository();
        $this->securityService = new SecurityService($personneRepository);
    }

    public function login()
    {
        $errors = $this->session->get('errors');
        if ($errors) {
            $this->session->unset('errors');
        }
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login = $_POST['login'] ?? '';
            $password = $_POST['password'] ?? '';
            
            Validator::resetErrors();

            if (Validator::isEmpty($login)) {
                Validator::addError('login', 'Le login est obligatoire');
            }

            if (Validator::isEmpty($password)) {
                Validator::addError('password', 'Le mot de passe est obligatoire');
            }
            
            if (!Validator::isValid()) {
                $this->session->set('errors', Validator::getErrors());
                
                header('Location: /');
                exit();
            }
            
            try {
                $user = $this->securityService->login($login, $password);
                
                if ($user) {
                    $this->session->set('user', [
                        'id' => $user->getId(),
                        'nom' => $user->getNom(),
                        'prenom' => $user->getPrenom(),
                        'type' => $user->getType() 
                    ]);
        
                    $userType = $user->getType()->value;

                    if ($userType === 'client') {
                        $this->session->set('success', 'Connexion réussie ! Bienvenue sur votre espace client.');
                        header('Location: /mes-commandes');
                    } else if ($userType === 'vendeur') {
                        $this->session->set('success', 'Connexion réussie ! Bienvenue sur votre espace vendeur.');
                        header('Location: /lister');
                    } else {
                        $this->session->set('success', 'Connexion réussie !');
                        header('Location: /lister'); 
                    }
                    exit();
                } else {
                    Validator::addError('auth', 'Identifiants incorrects');
                    $this->session->set('errors', Validator::getErrors());
                    
                    header('Location: /');
                    exit();
                }
            } catch (Exception $e) {
                Validator::addError('system', 'Une erreur est survenue lors de la connexion');
                $this->session->set('errors', Validator::getErrors());
                
                header('Location: /');
                exit();
            }
        } else {
            
            $this->render('login/login', [
                'errors' => $errors
            ]);
        }
    }

    public function logout()
    {
        $this->session->unset('user');
          $this->session->destroy('user');
        header('Location: /');
        exit();
    }

    public function register()
    {

    }

     public function create()
    {
     
    }
    public function delete(){

    }
    public function edit()
    {
        
    }
    public function show(){}
 
    public function store()
    {
        
    }
    public function update(){} 

    public function index()
    {
    }

    public function destroy()
    {
    }


}

?>