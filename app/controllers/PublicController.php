<?php

use app\controllers\Validate;

abstract class PublicController
{
    protected mixed $banco;
    protected String $tipo;
    protected Validate $validator;

    /**
     * @param String $tipo
     * @param mixed|null $banco
     */
    public function __construct(String $tipo, mixed $banco = null)
    {
        $this->banco = $banco;
        $this->tipo = $tipo;
        $this->validator = new Validate();
    }

    public function update(int $id): void
    {
        if(isset($this->banco)) {
            $tuples = $this->banco->read($id);
        }

        $page = APP_ROOT . '/resources/views/public/' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }
}