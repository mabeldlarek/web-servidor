<?php

use app\controllers\HomeController;
use app\controllers\EmpresaController;
use app\controllers\VeiculoController;
use app\controllers\UsuarioController;
use app\controllers\CarPageController;
use app\controllers\ReservaController;
use app\controllers\LoginController;

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
    } elseif ($_GET['page'] == 'adm_emprestimo') {
        $Controller = new EmprestimoController();
    } elseif ($_GET['page'] == 'home') {
        $Controller = new HomeController();
    } elseif ($_GET['page'] == 'home_cars') {
        $Controller = new CarPageController();
    } elseif ($_GET['page'] == 'home_reserva') {
        $Controller = new ReservaController();
    } elseif ($_GET['page'] == 'login') {
        $Controller = new LoginController();
    } elseif ($_GET['page'] == 'perfil') {
        $Controller = new ProfileController();
    } else {
        $found = false;
    }

    // Encontrando a operação
    if($found) {
        if($_GET['page'] != 'adm_veiculos' && $_GET['page'] != 'adm_empresas' && $_GET['page'] != 'adm_usuarios'){
            if($_GET['page'] == 'home_cars') {
                if($_GET['action'] == 'buscarCarros'){
                    $Controller->exibirCarros($_GET['dataEmprestimo'], $_GET['dataEntrega'],
                    $_GET['local']);
                }
            }
            elseif($_GET['page'] == 'home_reserva') {
                if($_GET['action'] == 'reservar'){
                    $Controller->exibirConfirmacaoReserva($_GET['IdCarroReserva'], $_GET['dataEmprestimo'],
                    $_GET['dataEntrega'], $_GET['local'], $_GET['idUsuario']);
                }
            }
            elseif($_GET['page'] == 'home') {
                    $Controller->exibirHomePage();
            }
            elseif($_GET['page'] == 'login') {
                $Controller->exibirLogin();
            }
        }
        if(isset($_GET['action'])) {
            if ($_GET['action'] == 'read') {
                $Controller->read();
            } elseif ($_GET['action'] == 'update') {
                $Controller->update($_GET['id']);
            } elseif ($_GET['action'] == 'delete') {
                $Controller->delete($_GET['id']);
            } elseif ($_GET['action'] == 'create') {
                $Controller->create();
            }
        }

    }

}
else {
    $Controller = new HomeController();
    $Controller->exibirHomePage();
}