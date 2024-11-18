<?php

namespace Controllers;

use Models\Jabea;

class JabeaController {

    public function listAll() {
        $jabea = new Jabea();
        $jabeak = $jabea->getAll();
        // view
        require_once __DIR__ . '/../views/iragaren-egunak-zerrenda.php';        
    }    
}
