<?php
class Film {
    private $izena;
    private $isan;
    private $urtea;
    private $puntuazioa;

    // Constructor
    public function __construct($izena, $isan, $urtea, $puntuazioa) {
        $this->setIzena($izena);
        $this->setIsan($isan);
        $this->setUrtea($urtea);
        $this->setPuntuazioa($puntuazioa);
    }

    // Getters
    public function getIzena() {
        return $this->izena;
    }

    public function getIsan() {
        return $this->isan;
    }

    public function getUrtea() {
        return $this->urtea;
    }

    public function getPuntuazioa() {
        return $this->puntuazioa;
    }

    // Setters
    public function setIzena($izena) {
        if (!empty($izena)) {
            $this->izena = $izena;
        } else {
            throw new Exception("Izena ezin da hutsik egon.");
        }
    }

    public function setIsan($isan) {
        if (!empty($isan)) {
            $this->isan = $isan;
        } else {
            throw new Exception("Isan ezin da hutsik egon.");
        }
    }

    public function setUrtea($urtea) {
        if (is_numeric($urtea) && $urtea > 1900 && $urtea <= date("Y")) {
            $this->urtea = $urtea;
        } else {
            throw new Exception("Urtea balioduna izan behar da.");
        }
    }

    public function setPuntuazioa($puntuazioa) {
        $this->puntuazioa = $puntuazioa;
        
    }
}