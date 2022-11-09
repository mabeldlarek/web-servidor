<?php

namespace app\controllers;

use app\models\UsuarioDAO;

class Autenticador
{
    protected mixed $banco;
    protected String $tipo;

    public function __construct()
    {
        $this->banco = new UsuarioDAO();
    }

    public function realizarLogin($login): bool
    {
        $usuario = $this->banco->obterUsuarioLogin($login);
        if (isset($usuario)) {

            $_SESSION['id_usuario']       = $usuario['id_usuario'];
            $_SESSION['nome']             = $usuario['nome'];
            $_SESSION['e_mail']           = $usuario['e_mail'];
            $_SESSION['data_nascimento']  = $usuario['data_nascimento'];
            $_SESSION['telefone']         = $usuario['telefone'];
            $_SESSION['cpf']              = $usuario['cpf'];
            $_SESSION['senha']            = $usuario['senha'];

            $nome = $usuario['nome'];

            if($nome == "adm"){
                $_SESSION['permissao'] = "S";
            }
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
