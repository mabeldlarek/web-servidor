<?php

use app\controllers\EmpresaController;
use app\controllers\VeiculoController;

// Carregando configurações

require './config/config.php';

// Acessando páginas
if(isset($_GET['page'])) {

    $found = true;

    // Encontrando o tipo da página
    if ($_GET['page'] == 'adm_veiculos') {
        $Controller = new VeiculoController();
    } elseif ($_GET['page'] == 'adm_empresas') {
        $Controller = new EmpresaController();
    } else {
        $found = false;
    }

    // Encontrando a operação
    if($found) {
        if ($_GET['action'] == 'read') {
            $Controller->read();
        } elseif ($_GET['action'] == 'update') {
            $Controller->update($_GET['id']);
        } elseif ($_GET['action'] == 'delete') {
            $Controller->delete($_GET['id']);
        } else {
            $Controller->create();
        }
    }

}
else {
    // TODO Substituir pela Home Screen
    $Controller = new VeiculoController();
    $Controller->read();
}


