<?php

namespace app\models;

use app\models\ModelDAO;

class UsuarioDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('usuario');
    }

    public function obterUsuarioLogin($login): array|null
    {
        $query = $this->conn->prepare(
            "SELECT * from usuario WHERE e_mail = :email AND senha = :senha");
        $query->bindValue("email", $login['email']);
        $query->bindValue("senha", $login['senha']);
        $query->execute();
        $usuario = null;

        if ($query->rowCount() > 0) {
            $usuario = $query->fetch();
        }

        return $usuario;
    }

    public function obterUsuarioPorEmail($email): bool|array
    {
        $query = $this->conn->prepare("SELECT * FROM usuario
        WHERE e_mail ='$email'");
        $query->execute();

        return $query->fetch();
    }

    public function obterUsuarioPorCPF($cpf): bool|array
    {
        $query = $this->conn->prepare("SELECT * FROM usuario
        WHERE cpf ='$cpf'");
        $query->execute();

        return $query->fetch();
    }
}
