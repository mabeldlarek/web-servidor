<?php
namespace app\controllers;

use PageController;
use app\models\VeiculoDAO;

class HomeController extends PageController
{
    public function __construct()
    {
        parent::__construct(new VeiculoDAO(), 'home');
    }
    
    public function saveSearch() {
        $validator = new Validate();
        if (!$validator->validateBusca($_POST)) {
                if (isset($_POST['data_emprestimo'])) {
                        redirect('/carros' . '/' . $_POST['data_emprestimo'] . '/'
                                . $_POST['data_entrega'] . '/' . $_POST['local']);
                }
        } else {
                $_SESSION['message'] = $validator->buildList();
                redirect('/');
        }
    }
}
