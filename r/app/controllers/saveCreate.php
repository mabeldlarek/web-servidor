<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();

// Definição de qual tabela armazenar os dados e validação de regras de negócio
if(isset($_POST['email'])) {

    //$banco = new UsuarioDAO();
    //$banco->update($_POST['id_usuario'], array_slice($_POST, 1));

} elseif (isset($_POST['placa'])) {

    if(!$validator->validateVeiculo($_POST)) {

        $_SESSION['message'] = 'Veículo criado com sucesso!';
        $_POST['placa'] = strtoupper($_POST['placa']);
        $banco = new VeiculoDAO();

        // Validação e create de imagem se tiver
        if(($_FILES['imagem']['tmp_name'] != null) && ($_POST['desc'] != null)) {

            $imagens = new ImagemDAO();
            $imagem = $_FILES['imagem']['tmp_name'];
            $imgContent = addslashes(file_get_contents($imagem));
            $desc = $_POST['desc'];

            unset($_POST['imagem'], $_POST['desc']);
            $banco->create($_POST);
            $imagens->create(array($desc, $imgContent, $banco->readLastId()[0]));

        } else {

            unset($_POST['imagem'], $_POST['desc']);
            $banco->create($_POST);
        }

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
