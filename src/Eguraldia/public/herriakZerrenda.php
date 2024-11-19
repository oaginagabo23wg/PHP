<?php

require_once '../config/db.php';
require_once '../models/Herria.php';
require_once '../controllers/HerriaController.php';

use Eguraldia\controllers\HerriaController;

$herriaController = new HerriaController();
$herriaController->listAll();