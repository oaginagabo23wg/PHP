<?php

namespace Controllers;

use Models\Kotxea;

class KotxeaController {

    public function listAll(){
        $kotxea = new Kotxea();
        $kotxeak = $kotxea->getAll();
        //echo "<pre>"; var_dump($kotxeak);echo "</pre>";
        require_once '../views/herri-zerrenda.php';
        //require_once '../views/herri-zerrenda-iragarpen-egunak-lortzeko.php';
    }

}
