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

    public function exibirCarros($data): void
    {
        $tuples = $this->banco->readByAvailableDate($data);

        $page = APP_ROOT . '/resources/views/layout/partials/pagecar.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function exibirReserva(): void
    {
        //$tuples = $this->banco->readByAvailableDate($data);

        $page = APP_ROOT . '/resources/views/layout/partials/reserva.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

}