<?php

include_once  dirname(__FILE__, 3) . '/config/config.php';

if(isset($_POST['data_emprestimo'])) {
        /*$date = new DateTime(($_GET['data_emprestimo'])); //tratamento de data
        echo $date->format('d-m-Y');*/
        header('Location: /?page=home_cars&action=buscarCarros&dataEmprestimo=' . $_POST['data_emprestimo']);
}
