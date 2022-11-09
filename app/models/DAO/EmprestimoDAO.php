<?php

namespace app\models;

use app\models\ModelDAO;

class EmprestimoDAO extends ModelDAO
{

    public function __construct()
    {
        parent::__construct('emprestimo');
    }

    public function read(int $id = null): bool|array
    {
        $query = $this->conn->prepare("
            SELECT id_emprestimo, data_emprestimo, data_entrega, placa, ano, marca, s.razao_social as empresa_emprestimo, s.endereco as endereco_emprestimo, d.razao_social as empresa_entrega, d.endereco as endereco_entrega 
            FROM emprestimo e 
            JOIN veiculo v USING(id_veiculo) 
            RIGHT JOIN empresa s ON s.id_empresa = id_empresa_emprestimo 
            RIGHT JOIN empresa d ON d.id_empresa = id_empresa_entrega 
            WHERE e.id_usuario = $id 
            ORDER BY data_emprestimo;
        ");
        $query->execute();

        return $query->fetchAll();
    }

    public function calcularDiasEmprestimo($dataEmprestimo, $dataEntrega) : int {
        $dtEmprestimo = new \DateTime($dataEmprestimo);
        $dtEntrega = new \DateTime($dataEntrega);
        $dias = $dtEmprestimo->diff($dtEntrega);

        return $dias->days;
    }

}
