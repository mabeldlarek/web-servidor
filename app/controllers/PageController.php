<?php

use app\models\EmprestimoDAO;
use app\models\ImagemDAO;

abstract class PageController
{
    protected mixed $banco;
    protected String $tipo;

    /**
     * @param mixed $banco
     * @param String $tipo
     */
    public function __construct(mixed $banco, String $tipo)
    {
        $this->banco = $banco;
        $this->tipo = $tipo;
    }

    public function exibirHomePage(): void
    {
        $page = APP_ROOT . '/resources/views/layout/partials/homepage.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirCarros($dataEmprestimo, $dataEntrega, $local): void
    {
        $bancoImages = new ImagemDAO();

        $tuples = $this->banco->readByAvailableDate($dataEmprestimo);
        $images = $bancoImages->readByVeiculo();
        $info = array("dataEmprestimo" => $dataEmprestimo, "dataEntrega" => $dataEntrega,
        "local" => $local);

        $page = APP_ROOT . '/resources/views/layout/partials/pagecar.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirConfirmacaoReserva($idCarro, $dataEmprestimo, $dataEntrega, $local, $idUsuario): void
    {
        $emprestimo = new EmprestimoDAO();

        $tuples = $this->banco->obterDadosVeiculo($idCarro);
        $empresa = $this->banco->obterDadosEmpresa($tuples['id_empresa']);

        $diasEmprestimo = $emprestimo-> calcularDiasEmprestimo($dataEmprestimo, $dataEntrega);

        $info = array("dataEmprestimo" => $dataEmprestimo, "dataEntrega" => $dataEntrega,
        "local" => $local, "idVeiculo" => $idCarro, "idUsuario" => $idUsuario);

        $page = APP_ROOT . '/resources/views/layout/partials/reserva.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirReserva(): void
    {
        $page = APP_ROOT . '/resources/views/layout/partials/reserva.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirLogin(): void
    {
        $page = APP_ROOT . '/resources/views/layout/partials/login.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirRegistro(): void
    {
        $page = APP_ROOT . '/resources/views/layout/partials/register.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

}