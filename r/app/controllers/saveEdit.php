<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();

if(isset($_POST['id_usuario'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['id_veiculo'])) {

    $banco = new VeiculoDAO();

    if(!$validator->validateVeiculo($_POST)) {
        $_SESSION['message'] = 'Veículo editado com sucesso!';
        $banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
        header('Location: /?page=adm_veiculos&action=read');
    } else {
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_veiculos&action=update&id=' . $_POST['id_veiculo']);
    }
} elseif (isset($_POST['cnpj'])) {

    if(!$validator->validateEmpresa($_POST)) {
        $_SESSION['message'] = 'Empresa editada com sucesso!';
        $banco = new EmpresaDAO();
        $banco->update($_POST['id_empresa'], array_slice($_POST, 1));
        header('Location: /?page=adm_empresas&action=read');
    } else {
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_empresas&action=update&id=' . $_POST['id_empresa']);
    }
}
