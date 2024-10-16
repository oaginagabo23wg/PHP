<?php
class Film {
    public $izena;
    public $isan;
    public $urtea;
    public $puntuazioa;

    // Constructor
    public function __construct($izena, $isan, $urtea) {
        $this->izena = $izena; 
        $this->isan = $isan;   
        $this->urtea = $urtea;     
    }
}