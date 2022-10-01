<?php
namespace app\controllers;

include_once  dirname(__FILE__, 3) . '/config/config.php';

use PageController;
use UsuarioDAO;

class LoginController extends PageController
{
    public function __construct()
    {
        parent::__construct(new UsuarioDAO(), 'login');
    }
}