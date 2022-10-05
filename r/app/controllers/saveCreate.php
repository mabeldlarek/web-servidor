<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();
var_dump($_POST);

// Definição de qual tabela armazenar os dados e validação de regras de negócio
if(isset($_POST['email'])) {
    if(!$validator->validateUsuario($_POST)) {

        $_SESSION['message'] = 'Usuario criado com sucesso!';
        $banco = new UsuarioDAO();
        $banco->create($_POST);
        header('Location: /?page=adm_usuarios&action=read');

    } else {

        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_usuarios&action=create');
    }

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
elseif (isset($_POST['id_empresa_emprestimo'])) {
    //faltam as validações
        $banco = new EmprestimoDAO();
        $banco->create($_POST);
        echo("sucesso");
        //redirecionar pra pagina do usuario
}
elseif (isset($_POST['senha'])) {
    if(!$validator->validateUsuario($_POST)) {

        $_SESSION['message'] = 'Usuario criado com sucesso!';
        $banco = new UsuarioDAO();
        $banco->create($_POST);
        header('Location: /?page=adm_usuarios&action=read');

    } else {

        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=adm_usuarios&action=create');
    }
}
