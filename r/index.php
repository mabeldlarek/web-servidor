<?php

use app\controllers\VeiculoController;

// Carregando configurações

require './config/config.php';

if(isset($_GET['page'])) {

    if ($_GET['page'] == 'adm_veiculos') {
        $vController = new VeiculoController();
        if ($_GET['action'] == 'list') {
            $vController->listVehicles();
        } elseif ($_GET['action'] == 'edit') {
            $vController->editVehicles($_GET['id']);
        } elseif ($_GET['action'] == 'remove') {
            $vController->removeVehicle($_GET['id']);
        } else {
            $vController->createVehicle();
        }
    }
}
else {
    $vController = new VeiculoController();
    $vController->listVehicles();
}


