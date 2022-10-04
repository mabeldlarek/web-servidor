<?php

namespace app\controllers;

include_once  dirname(__FILE__, 3) . '/config/config.php';

use UsuarioDAO;

class Autenticador
{
    protected mixed $banco;
    protected String $tipo;

    /**
     * @param $banco
     * @param $tipo
     */
    public function __construct()
    {
        $this->banco = new UsuarioDAO();
    }

    public function realizarLogin($login): bool
    {
        $usuario = $this->banco->obterUsuarioLogin($login);
        if (isset($usuario)) {
            $_SESSION['id_usuario'] = $usuario['id_usuario'];
            $_SESSION['nome'] = $usuario['nome'];
            return true;
        } else {
            return false;
        }
    }

    public function verificarLogin(): bool
    {
        if (isset($_SESSION['id_usuario'])) {
            return true;
        } else{
            return false;
        }
    }
}
