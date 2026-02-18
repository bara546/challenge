<?php

namespace App\Entity;




enum Statut: string
{
    case Payer = 'Paye';
    case Impaye = 'Impaye';
}
