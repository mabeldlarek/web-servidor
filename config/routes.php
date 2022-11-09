<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

// Rotas públicas
Router::get('/', 'HomeController@exibirHomePage');

Router::group(['prefix' => 'login'], function () {
    Router::get('/', 'LoginController@exibirLogin');
    Router::get('/sair', 'LoginController@saveLogout');
    Router::post('/entrar', 'LoginController@saveLogin');
});

Router::group(['prefix' => 'cadastro'], function () {
    Router::get('/', 'LoginController@exibirRegistro');
    Router::post('/registrar', 'LoginController@saveRegister');
});

// Rotas para usuários autenticados
Router::group(['middleware' => Auth::class], function () {
    Router::get('/carros/{dataEmprestimo}/{dataEntrega}/{local}', 'CarPageController@exibirCarros');
    Router::get('/confirmacao/{idCarro}/{dataEmprestimo}/{dataEntrega}/{local}/{idUsuario}', 'CarPageController@exibirConfirmacaoReserva');
    Router::post('/reservar', 'CarPageController@saveReserva');
    Router::post('/confirmar', 'CarPageController@saveCreate');
    Router::post('/buscar', 'HomeController@saveSearch');
});

// Rotas particulares para usuários autenticados
Router::group(['prefix' => 'perfil', 'middleware' => AuthProfile::class], function () {
    Router::get('/editar/{id}', 'ProfileController@update');
    Router::get('/editar/delete/{id}', 'EmprestimoController@delete');
    Router::post('/editar/salvar/{id}', 'ProfileController@saveUpdate');
});

// Rotas para usuários autenticados como administradores
Router::group(['prefix' => 'admin', 'middleware' => AuthAdmin::class], function () {

    // Rotas para CRUD de carros
    Router::group(['prefix' => 'carros'], function () {
        Router::get('/create', 'VeiculoController@create');
        Router::get('/read', 'VeiculoController@read');
        Router::get('/update/{id}', 'VeiculoController@update');
        Router::get('/delete/{id}', 'VeiculoController@delete');
        Router::post('/create/save', 'VeiculoController@saveCreate');
        Router::post('/update/save/{id}', 'VeiculoController@saveupdate');
    });

    // Rotas para CRUD de usuários
    Router::group(['prefix' => 'usuarios'], function () {
        Router::get('/create', 'UsuarioController@create');
        Router::get('/read', 'UsuarioController@read');
        Router::get('/update/{id}', 'UsuarioController@update');
        Router::get('/delete/{id}', 'UsuarioController@delete');
        Router::post('/create/save', 'UsuarioController@saveCreate');
        Router::post('/update/save/{id}', 'UsuarioController@saveupdate');
    });

    // Rotas para CRUD de empresas
    Router::group(['prefix' => 'empresas'], function () {
        Router::get('/create', 'EmpresaController@create');
        Router::get('/read', 'EmpresaController@read');
        Router::get('/update/{id}', 'EmpresaController@update');
        Router::get('/delete/{id}', 'EmpresaController@delete');
        Router::post('/create/save', 'EmpresaController@saveCreate');
        Router::post('/update/save/{id}', 'EmpresaController@saveupdate');
    });
});
