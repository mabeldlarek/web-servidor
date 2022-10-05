<?php

namespace app\controllers;

use AdminController;
use EmpresaDAO;
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
        $bancoEmpreas = new EmpresaDAO();

        $images =  $bancoImages->readByVeiculo();
        $empresas = $bancoEmpreas->read();

        $tuple = $this->banco->read($id);

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/edit' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function create(): void
    {
        $bancoEmpreas = new EmpresaDAO();
        $empresas = $bancoEmpreas->read();

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/create' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }
}
