<?php

namespace app\controllers;

use VeiculoDAO;

class VeiculoController
{
    private VeiculoDAO $banco;

    public function __construct()
    {
        $this->banco = new VeiculoDAO();
    }


    public function listVehicles(): void
    {
        $veiculos = $this->banco->read();
        $disponiveis = $this->banco->readByAvailableDate('2022-10-10');

        //$veiculos = $disponiveis;

        $page = APP_ROOT . '/resources/views/admin/veiculo/listveiculo.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function editVehicles($id): void
    {
        $veiculo = $this->banco->read($id);

        $page = APP_ROOT . '/resources/views/admin/veiculo/editveiculo.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function removeVehicle(mixed $id): void
    {
        $this->banco->delete($id);

        $_SESSION['message'] = 'Veículo removido com sucesso!';

        header('Location: /index.php/?page=adm_veiculos&action=list');
    }
}
