<?php

namespace app\controllers;

use AdminController;
use EmpresaDAO;

class EmpresaController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new EmpresaDAO(), 'empresa');
    }
}
