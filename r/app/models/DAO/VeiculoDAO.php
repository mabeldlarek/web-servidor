<?php

use app\models\ModelDAO;

class VeiculoDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('veiculo');
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

    public function obterDadosReserva($idCarro): bool|array
    {
        $query = $this->conn->prepare("SELECT * FROM veiculo
        WHERE id_veiculo ='$idCarro'");
        $query->execute();

        return $query->fetch();
    }
}