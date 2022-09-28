<?php

use app\models\ModelDAO;

class UsuarioDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('usuario');
    }
}