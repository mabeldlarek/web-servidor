<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();

// Definição de qual tupla atualizar os dados e validação de regras de negócio
if(isset($_POST['id_usuario'])) {
    if(!$validator->validateUsuario($_POST)) {

        $_SESSION['message'] = 'Usuário editado com sucesso!';
        $banco = new UsuarioDAO();
        $banco->update($_POST['id_usuario'], array_slice($_POST, 1));
        header('Location: /?page=adm_usuarios&action=read');

    } else {

        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_usuarios&action=update&id=' . $_POST['id_usuario']);
    }

} elseif (isset($_POST['id_veiculo'])) {

    $banco = new VeiculoDAO();

    if(!$validator->validateVeiculo($_POST)) {

        $_SESSION['message'] = 'Veículo editado com sucesso!';
        $_POST['placa'] = strtoupper($_POST['placa']);

        // Validação e update de imagem se tiver
        if(($_FILES['imagem']['tmp_name'] != null) && ($_POST['desc'] != null)) {

            $imagens = new ImagemDAO();
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
            $desc = $_POST['desc'];

            unset($_POST['imagem'], $_POST['desc']);
            $banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
            if(isset($imagens->readByVeiculo()[$_POST['id_veiculo']])) {
                $imagens->update($imagens->readByVeiculo()[$_POST['id_veiculo']][2], array("descricao" => $desc, "imagem" => $imgContent, "id_veiculo" => $_POST['id_veiculo']));
            } else {
                $imagens->create(array($desc, $imgContent, $_POST['id_veiculo']));
            }

        } else {

            unset($_POST['imagem'], $_POST['desc']);
            $banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
        }

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
