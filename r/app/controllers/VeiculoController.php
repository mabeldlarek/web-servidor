<?php

namespace app\controllers;

use AdminController;
use ImagemDAO;
use VeiculoDAO;

class VeiculoController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new VeiculoDAO(), 'veiculo');
    }

    public function read(): void
    {
        $bancoImages = new ImagemDAO();

        $images =  $bancoImages->readByVeiculo();

        $tuples = $this->banco->read();

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/list' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function update($id): void
    {
        $bancoImages = new ImagemDAO();

        $images =  $bancoImages->readByVeiculo();

        $tuple = $this->banco->read($id);

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/edit' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }
}
