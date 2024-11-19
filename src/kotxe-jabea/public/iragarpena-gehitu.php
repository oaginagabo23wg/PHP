<?php


// config
require_once '../config/config.php';
// models
require_once '../models/IragarpenEguna.php';
require_once '../models/Herria.php';
// controllers
require_once '../controllers/IragarpenEgunaController.php';

use Controllers\IragarpenEgunaController;

$herria_id = $_REQUEST["herria_id"];
$eguna = $_REQUEST["eguna"];
$iragarpen_testua = $_REQUEST["iragarpen_testua"];
$eguraldia = $_REQUEST["eguraldia"];
$tenperatura_minimoa = $_REQUEST["tenperatura_minimoa"];
$tenperatura_maximoa = $_REQUEST["tenperatura_maximoa"];

$iragarpenakController = new IragarpenEgunaController();
$iragarpenakController->iragarpenaGehitu($herria_id, $eguna, $iragarpen_testua, $eguraldia, $tenperatura_minimoa, $tenperatura_maximoa);
