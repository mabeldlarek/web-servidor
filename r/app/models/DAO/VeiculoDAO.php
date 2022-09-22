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
}