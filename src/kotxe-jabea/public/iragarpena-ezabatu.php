<?php


// config
require_once '../config/config.php';
// models
require_once '../models/IragarpenEguna.php';
require_once '../models/Herria.php';
// controllers
require_once '../controllers/IragarpenEgunaController.php';

use Controllers\IragarpenEgunaController;

$id = $_REQUEST["id"];

$iragarpenakController = new IragarpenEgunaController();
$iragarpenakController->iragarpenaEzabatu($id);

