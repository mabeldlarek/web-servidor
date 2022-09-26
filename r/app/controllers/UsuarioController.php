<?php

namespace app\controllers;

use AdminController;
use UsuarioDAO;

class UsuarioController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new UsuarioDAO(), 'usuario');
    }
}