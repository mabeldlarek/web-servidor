<?php

use app\controllers\Autenticador;

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();
$autenticador = new Autenticador();
$usuario = $autenticador->realizarLogin($_POST);

if(isset($_POST['email'])|| isset($_POST['senha'])) {
    if(!$validator->validateLogin($_POST, $usuario)){
        $nome = $_SESSION['nome'];
        if($nome == "adm"){
            header('Location: /?page=adm_veiculos&action=read');
        } else
            header('Location: /?page=home');
    }
    else{
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=login');
    }
}
