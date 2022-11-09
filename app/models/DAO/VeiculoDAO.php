<?php

namespace app\models;

use app\models\ModelDAO;

class VeiculoDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('veiculo');
    }

    public function read(int $id = null): bool|array
    {
        if (isset($id)) {

            $query = $this->conn->prepare("SELECT v.*, e.razao_social FROM veiculo v
                                                 JOIN empresa e USING(id_empresa) 
                                                 WHERE v.id_veiculo = $id");
            $query->execute();

            return $query->fetch();
        } else {

            $query = $this->conn->prepare("SELECT v.*, e.razao_social FROM veiculo v
                                                 JOIN empresa e USING(id_empresa)");
            $query->execute();

            return $query->fetchAll();
        }
    }

    public function readByAvailableDate(String $date): bool|array
    {
        $query = $this->conn->prepare(
            "SELECT * FROM veiculo WHERE id_veiculo NOT IN (SELECT id_veiculo FROM emprestimo WHERE '$date' BETWEEN data_emprestimo AND data_entrega)");
        $query->execute();

        return $query->fetchAll();
    }

    public function readLastId(): bool|array
    {

        $query = $this->conn->prepare(
            "SELECT MAX(id_veiculo) FROM veiculo");
        $query->execute();

        return $query->fetch();

    }

    public function obterDadosVeiculo($idCarro): bool|array
    {
        $query = $this->conn->prepare("SELECT * FROM veiculo
        WHERE id_veiculo ='$idCarro'");
        $query->execute();

        return $query->fetch();
    }

    public function obterDadosEmpresa($idEmpresa): bool|array
    {
        $query = $this->conn->prepare("SELECT * FROM empresa
        WHERE id_empresa ='$idEmpresa'");
        $query->execute();

        return $query->fetch();
    }
}