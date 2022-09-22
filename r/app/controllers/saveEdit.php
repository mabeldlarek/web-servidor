<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['id_usuario'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['id_veiculo'])) {

    $_SESSION['message'] = 'Veículo editado com sucesso!';
    $banco = new VeiculoDAO();
    $banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
    header('Location: /index.php/?page=adm_veiculos&action=list');
}
