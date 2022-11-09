<?php

namespace app\controllers;

use PageController;
use app\models\VeiculoDAO;
use app\models\EmprestimoDAO;
use app\controllers\Autenticador;
use app\controllers\Validate;

class CarPageController extends PageController
{
    public function __construct()
    {
        parent::__construct(new VeiculoDAO(), 'home_cars');
    }

    public function saveReserva(): void
    {
        $validator = new Validate();
        $autenticador = new Autenticador();

        if (isset($_POST['IdCarroReserva'])) {
            $permissao = $autenticador->verificarLogin();

            if (!$validator->validateReserva($permissao)) {
                redirect('/confirmacao'
                . '/' . $_POST['IdCarroReserva'] 
                . '/' . $_POST['data_emprestimo']
                . '/' . $_POST['data_entrega'] 
                . '/' . $_POST['local']
                . '/' . $_SESSION['id_usuario']);
            } else {
                $_SESSION['message'] = $validator->buildList();
                redirect('/carros' . '/' . $_POST['data_emprestimo'] .
                    '/' . $_POST['data_entrega'] . '/' . $_POST['local']);
            }
        } else {
            if (isset($_POST['data_emprestimo'])) {
                redirect('/carros' . '/' . $_POST['data_emprestimo']);
            }
        }
    }

    public function saveCreate(): void {
        $banco = new EmprestimoDAO();
        $banco->create($_POST);
        echo("sucesso");
        header('/perfil/editar/' . $_SESSION['id_usuario']);
    }
}
