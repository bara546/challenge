<?php

namespace App\Entity;



enum UserType: string
{
    case client = 'client';
    case vendeur = 'vendeur';
}


