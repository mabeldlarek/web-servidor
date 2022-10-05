<?php

/**
 * Classe abstrata para controller de CRUD básico
 */
abstract class AdminController
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

    public function read(): void
    {
        $tuples = $this->banco->read();

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/list' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function update($id): void
    {
        $tuple = $this->banco->read($id);

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/edit' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function delete(mixed $id): void
    {
        $this->banco->delete($id);

        $_SESSION['message'] = 'Exclusão realizada com sucesso!';

        header('Location: /?page=adm_' . $this->tipo . 's&action=read');
    }

    public function create(): void
    {
        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/create' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }
}