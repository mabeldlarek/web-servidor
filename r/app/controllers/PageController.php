<?php

abstract class PageController
{
    protected mixed $banco;
    protected String $tipo;

    /**
     * @param $banco
     * @param $tipo
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
        $tuples = $this->banco->readByAvailableDate($dataEmprestimo);
        $info = array("dataEmprestimo" => $dataEmprestimo, "dataEntrega" => $dataEntrega,
        "local" => $local);

        $page = APP_ROOT . '/resources/views/layout/partials/pagecar.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirConfirmacaoReserva($idCarro, $dataEmprestimo, $dataEntrega, $local): void
    {
        $tuples = $this->banco->obterDadosVeiculo($idCarro);
        $info = array("dataEmprestimo" => $dataEmprestimo, "dataEntrega" => $dataEntrega,
        "local" => $local, "idVeiculo" => $idCarro);
        $page = APP_ROOT . '/resources/views/layout/partials/reserva.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirReserva(): void
    {
       // $tuples = $this->banco->obterDadosReserva($idCarro);

        $page = APP_ROOT . '/resources/views/layout/partials/reserva.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirLogin(): void
    {
        //$tuples = $this->banco->readByAvailableDate($data);

        $page = APP_ROOT . '/resources/views/layout/partials/login.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }
}