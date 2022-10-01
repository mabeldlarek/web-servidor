<?php

use app\models\ModelDAO;

class UsuarioDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('usuario');
    }

    public function obterUsuarioLogin($login):array|bool
    {
        $query = $this->conn->prepare(
            "SELECT id_usuario, nome from usuario WHERE e_mail = :email AND senha = :senha");
        $query->bindValue("email", $login['email']);
        $query->bindValue("senha", $login['senha']);
        $query->execute();
        $usuario = $query->fetch();
        return $usuario;
    }
}