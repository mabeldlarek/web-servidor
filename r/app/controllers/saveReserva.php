<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['data_emprestimo'])) {
        /*$date = new DateTime(($_GET['data_emprestimo'])); //tratamento de data
        echo $date->format('d-m-Y');*/
    header('Location: /?page=cars&action=buscarCarros&dataEmprestimo=' . $_POST['data_emprestimo']);
}

if(isset($_POST['IdCarroReserva']))
{
    header('Location: /?page=home_reserva&action=reservar&IdCarroReserva=' . $_POST['IdCarroReserva']. '&dataEmprestimo='.
    $_POST['data_emprestimo'] .'&dataEntrega=' . $_POST['data_entrega'] . '&local=' . $_POST['local']);
}

/*if(isset($_POST['confirmaReserva']))
{
    $banco = new EmprestimoDAO();

    header('Location: /?page=home_reserva&action=confirmarReserva' . $_POST['confirmaReserva']);
}*/

