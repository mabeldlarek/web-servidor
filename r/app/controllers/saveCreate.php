<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();

if(isset($_POST['email'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['placa'])) {

    if(!$validator->validateVeiculo($_POST)) {
        $_SESSION['message'] = 'Veículo criado com sucesso!';
        $_POST['placa'] = strtoupper($_POST['placa']);
        $banco = new VeiculoDAO();
        $banco->create($_POST);
        header('Location: /?page=adm_veiculos&action=read');
    } else {
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_veiculos&action=create');
    }
} elseif (isset($_POST['cnpj'])) {

    if(!$validator->validateEmpresa($_POST)) {
        $_SESSION['message'] = 'Empresa criada com sucesso!';
        $banco = new EmpresaDAO();
        $banco->create($_POST);
        header('Location: /?page=adm_empresas&action=read');
    } else {
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_empresas&action=create');
    }
}
