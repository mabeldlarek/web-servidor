<?php

namespace app\controllers;

use AdminController;
use VeiculoDAO;

class VeiculoController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new VeiculoDAO(), 'veiculo');
    }
}
