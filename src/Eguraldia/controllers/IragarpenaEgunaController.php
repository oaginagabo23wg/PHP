<?php

namespace Eguraldia\controllers;

use Eguraldia\models\Herria;
use Eguraldia\models\IragarpenEguna;

class IragarpenEgunaController
{
    public function listAllById($id)
    {
        $iragarpenEguna = new IragarpenEguna();
        $iragarpenEgunak = $iragarpenEguna->listAllById($id);
        require_once '../views/iragarpenakZerrenda.php';
    }
}
