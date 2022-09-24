<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['id_usuario'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['id_veiculo'])) {

    $_SESSION['message'] = 'Veículo editado com sucesso!';
    $banco = new VeiculoDAO();
    $banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
    header('Location: /?page=adm_veiculos&action=read');
} elseif (isset($_POST['cnpj'])) {

    $_SESSION['message'] = 'Empresa editada com sucesso!';
    $banco = new EmpresaDAO();
    $banco->update($_POST['id_empresa'], array_slice($_POST, 1));
    header('Location: /?page=adm_empresas&action=read');
}
