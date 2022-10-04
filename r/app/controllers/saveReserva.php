<?php

use app\controllers\Autenticador;

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();
$autenticador = new Autenticador();

if (isset($_POST['IdCarroReserva'])) {
    $permissao = $autenticador->verificarLogin();
    
    if (!$validator->validateReserva($permissao)) {
        header('Location: /?page=home_reserva&action=reservar&IdCarroReserva=' . $_POST['IdCarroReserva'] . '&dataEmprestimo=' .
            $_POST['data_emprestimo'] . '&dataEntrega=' . $_POST['data_entrega'] . '&local=' . $_POST['local'] . '&idUsuario='. $_SESSION['id_usuario']);
    }
    else{
        $_SESSION['message'] = $validator->buildList();
        header('Location: /?page=home_cars&action=buscarCarros&dataEmprestimo=' . $_POST['data_emprestimo'] .
        '&dataEntrega=' . $_POST['data_entrega'] . '&local=' . $_POST['local']);
    }
} else{
    if (isset($_POST['data_emprestimo'])) {
        header('Location: /?page=cars&action=buscarCarros&dataEmprestimo=' . $_POST['data_emprestimo']);
    }
}
