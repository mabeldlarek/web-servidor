<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

$validator = new Validate();
if (!$validator->validateBusca($_POST)) {
        if (isset($_POST['data_emprestimo'])) {
                header('Location: /?page=home_cars&action=buscarCarros&dataEmprestimo=' . $_POST['data_emprestimo'] .
                        '&dataEntrega=' . $_POST['data_entrega'] . '&local=' . $_POST['local']);
        }
} else {
        header('Location: /?page=home');
}
