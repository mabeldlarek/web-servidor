<?php

use app\models\ModelDAO;

class EmpresaDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('empresa');
    }
}
