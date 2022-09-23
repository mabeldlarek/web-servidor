<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['email'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['placa'])) {

    $_SESSION['message'] = 'Veículo criado com sucesso!';
    $banco = new VeiculoDAO();
    $banco->create($_POST);
    header('Location: /index.php/?page=adm_veiculos&action=list');
}
