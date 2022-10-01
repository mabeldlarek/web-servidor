<?php

use app\controllers\Autenticador;

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();
$autenticador = new Autenticador();
$usuario = $autenticador->realizarLogin($_POST);

if(isset($_POST['email'])) {
    if(!$validator->validateLogin($_POST, $usuario)){
        header('Location: /?page=home');
    }
    else{
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=login');
    }
}
