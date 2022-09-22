<?php
namespace app\models;

use PDO;

class Veiculo
{
    protected $id_carro;
    protected $placa;
    protected $modelo;
    protected $marca;
    protected $ano;
    protected $cor;
    protected $quilometragem;
    protected $custo_dia;



    //getters & setters

    /**
     * @param $placa
     * @param $modelo
     * @param $marca
     * @param $ano
     * @param $cor
     * @param $quilometragem
     * @param $custo_dia
     */
    public function __construct($placa, $modelo, $marca, $ano, $cor, $quilometragem, $custo_dia)
    {
        $this->placa = $placa;
        $this->modelo = $modelo;
        $this->marca = $marca;
        $this->ano = $ano;
        $this->cor = $cor;
        $this->quilometragem = $quilometragem;
        $this->custo_dia = $custo_dia;
    }

    /**
     * @return mixed
     */
    public function getIdCarro()
    {
        return $this->id_carro;
    }

    /**
     * @return mixed
     */
    public function getPlaca()
    {
        return $this->placa;
    }

    /**
     * @param mixed $placa
     */
    public function setPlaca($placa): void
    {
        $this->placa = $placa;
    }

    /**
     * @return mixed
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * @param mixed $modelo
     */
    public function setModelo($modelo): void
    {
        $this->modelo = $modelo;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * @param mixed $ano
     */
    public function setAno($ano): void
    {
        $this->ano = $ano;
    }

    /**
     * @return mixed
     */
    public function getCor()
    {
        return $this->cor;
    }

    /**
     * @param mixed $cor
     */
    public function setCor($cor): void
    {
        $this->cor = $cor;
    }

    /**
     * @return mixed
     */
    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    /**
     * @param mixed $quilometragem
     */
    public function setQuilometragem($quilometragem): void
    {
        $this->quilometragem = $quilometragem;
    }

    /**
     * @return mixed
     */
    public function getCustoDia()
    {
        return $this->custo_dia;
    }

    /**
     * @param mixed $custo_dia
     */
    public function setCustoDia($custo_dia): void
    {
        $this->custo_dia = $custo_dia;
    }
}
