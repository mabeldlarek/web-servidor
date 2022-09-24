<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['email'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['placa'])) {

    $_SESSION['message'] = 'Veículo criado com sucesso!';
    $banco = new VeiculoDAO();
    $banco->create($_POST);
    header('Location: /?page=adm_veiculos&action=read');
} elseif (isset($_POST['cnpj'])) {

    $_SESSION['message'] = 'Empresa criada com sucesso!';
    $banco = new EmpresaDAO();
    $banco->create($_POST);
    header('Location: /?page=adm_empresas&action=read');
}
