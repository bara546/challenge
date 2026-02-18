<?php

namespace App\Controller;

class ErreurController
{
    public function erreur404()
    {
        include __DIR__ . '/../../Template/erreu/erruer.php';
    }


     public function erreur403()
    {
        include __DIR__ . '/../../Template/erreu/erreur403.php';
    }
}
