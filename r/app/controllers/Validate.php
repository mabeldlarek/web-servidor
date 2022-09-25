<?php

class Validate
{

    private array $messages;

    // Função para verificar se todos os campos foram preenchidos
    private function isEmpty(array $arr): bool
    {
        foreach ($arr as $value) {
            if (empty($value)) {
                return true;
            }
        }
        return false;
    }

    // Função para validação de cnpj, adaptada de https://gist.github.com/guisehn/3276302
    private function validateCNPJ($cnpj): bool
    {
        if (strlen($cnpj) != 14)
            return false;

        if (preg_match('/(\d)\1{13}/', $cnpj))
            return false;

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++)
        {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    // Transforma array de mensagens em uma lista HTML
    public function buildList(): ?string
    {
        if(isset($this->messages)) {
            $list = "<ul>";
            foreach ($this->messages as $message) {
                $list .= "<li><span>$message;</span></li>";
            }
            $list .= "</ul>";
            return $list;
        }

        return null;
    }

    // Validação de todos os campos de um veiculo, montando array de mensagem de erro
    public function validateVeiculo(array $veiculo): bool
    {

        if($this->isEmpty($veiculo)) {
            $this->messages[] = 'Todos os campos devem ser preenchidos';
        } else {
            if ((strlen($veiculo['placa']) <> 7) || (!preg_match('/[A-Z0-9]/i', $veiculo['placa']))) {
                $this->messages[] = 'Placa inválida';
            }
            if (strlen($veiculo['modelo']) > 200) {
                $this->messages[] = 'Nome de modelo muito grande';
            }
            if (strlen($veiculo['marca']) > 200) {
                $this->messages[] = 'Nome de marca muito grande';
            }
            if ((strlen($veiculo['ano']) <> 4) || ($veiculo['ano'] > date("Y"))) {
                $this->messages[] = 'Ano inválido';
            }
            if (strlen($veiculo['cor']) > 20) {
                $this->messages[] = 'Nome de cor muito grande';
            }
            if (($veiculo['quilometragem'] > 100000) || ($veiculo['quilometragem'] < 0.01)) {
                $this->messages[] = 'Valor de quilometragem inválido';
            }
            if (($veiculo['custo_dia'] > 100000) || ($veiculo['custo_dia'] < 0.01)) {
                $this->messages[] = 'Valor por dia inválido';
            }
        }

        return isset($this->messages);
    }

    // Validação de todos os campos de uma empresa, montando array de mensagem de erro
    public function validateEmpresa(array $empresa): bool
    {

        if($this->isEmpty($empresa)) {
            $this->messages[] = 'Todos os campos devem ser preenchidos';
        } else {
            if (!$this->validateCNPJ($empresa['cnpj'])) {
                $this->messages[] = 'CNPJ inválido';
            }
            if (strlen($empresa['razao_social']) > 200) {
                $this->messages[] = 'Razão Social muito grande';
            }
            if (strlen($empresa['endereco']) > 200) {
                $this->messages[] = 'Endereço muito grande';
            }
            if ((strlen($empresa['uf']) <> 2) || (!preg_match('/[A-Z]/', $empresa['uf']))) {
                $this->messages[] = 'UF inválida';
            }
        }

        return isset($this->messages);
    }

}