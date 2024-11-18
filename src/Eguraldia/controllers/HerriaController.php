<?php

namespace Eguraldia\controllers;

use Eguraldia\models\Herria;

class HerriaController
{
    public function listAll()
    {
        $herria = new Herria();
        $herriak = $herria->getAll();
        require_once '../views/herriakZerrenda.php';
    }
    public function create($izena)
    {
        $herria = new Herria();
        $herria->create($izena);
        require_once '../views/herriakZerrenda.php';
    }
    // public function update($id, $izena){
    //     $
    // }
    public function delete($id)
    {
        $herria = new Herria();
        $herria->delete($id);
        require_once '../views/herriakZerrenda.php';
    }
}
