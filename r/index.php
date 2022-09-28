<?php

use app\controllers\HomeController;
use app\controllers\EmpresaController;
use app\controllers\VeiculoController;
use app\controllers\UsuarioController;
use app\controllers\CarPageController;
use app\controllers\ReservaController;

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
    } elseif ($_GET['page'] == 'adm_usuarios') {
        $Controller = new UsuarioController();
    }elseif ($_GET['page'] == 'home') {
        $Controller = new HomeController();
    }elseif ($_GET['page'] == 'home_cars') {
        $Controller = new CarPageController();
    }elseif ($_GET['page'] == 'home_reserva') {
        $Controller = new ReservaController();
    }else {
        $found = false;
    }

    // Encontrando a operação
    if($found) {
        if($_GET['page'] != 'adm_veiculos' && $_GET['page'] != 'adm_empresas' && $_GET['page'] != 'adm_usuarios'){
            if($_GET['page'] == 'home_cars') {
                if($_GET['action'] == 'buscarCarros'){
                    $Controller->exibirCarros($_GET['dataEmprestimo']);
                }
            }
            if($_GET['page'] == 'home_reserva') {
                if($_GET['action'] == 'reservar'){
                    $Controller->exibirReserva();
                }
            }
            elseif($_GET['page'] == 'home') {
                    $Controller->exibirHomePage();
            }
        }else{
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

}
else {
    // TODO Substituir pela Home Screen
    $Controller = new VeiculoController();
    $Controller->read();
}


