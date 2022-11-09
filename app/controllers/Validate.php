<?php

namespace app\controllers;

use app\models\VeiculoDAO;
use app\models\EmprestimoDAO;

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

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto))
            return false;

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    // Transforma array de mensagens em uma lista HTML
    public function buildList(): ?string
    {
        if (isset($this->messages)) {
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
        unset($veiculo['desc']);
        if ($this->isEmpty($veiculo)) {
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

        if ($this->isEmpty($empresa)) {
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

    public function validateLogin($login, $permissao): bool
    {
        if ($permissao === false) {
            if ((strlen($login['email']) === 0)) {
                $this->messages[] = 'Informe seu e-mail.';
            }
            if ((strlen($login['senha']) === 0)) {
                $this->messages[] = 'Informe sua senha.';
            } else
                $this->messages[] = 'E-mail ou senha incorretos';
        }

        return isset($this->messages);
    }

    public function validateReserva($permissao): bool
    {
        if ($permissao === false) {
            $this->messages[] = 'Você precisa estar logado para prosseguir com a reserva.';
        }
        return isset($this->messages);
    }

    public function teste(): bool
    {
        return true;
    }

    public function validateUsuario(array $usuario): bool
    {

        if ($this->isEmpty($usuario)) {
            $this->messages[] = 'Todos os campos devem ser preenchidos';
        } else {
            if (!$this->validateCPF($usuario['cpf'])) {
                $this->messages[] = 'CPF inválido';
            }
            if (!$this->validateEmail($usuario['e_mail'])) {
                $this->messages[] = 'E-mail inválido';
            }
            if (strlen($usuario['nome']) > 50) {
                $this->messages[] = 'Nome muito grande';
            }
            if (strlen($usuario['senha']) < 8) {
                $this->messages[] = 'Informe uma senha com no mínimo 8 caracteres';
            }
            if ($this->validateData($usuario['data_nascimento'])) {
                if (!$this->validateIdade($usuario['data_nascimento'])) {
                    $this->messages[] = 'Necessário ser maior de 18 anos';
                }
            } else {
                $this->messages[] = 'Data inválida';
            }
        }

        return isset($this->messages);
    }

    //Função para validação de cpf, adaptada de https://dev.to/alexandrefreire/funcao-em-php-para-validar-cpf-3kpd
    function validateCPF($cpf)
    {

        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    public function validateEmail($email)
    {
        if (preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $email)) {
            return true;
        } else {
            return false;
        }
    }

    public function validateData($dataUser): bool
    {
        $dia = date("d", strtotime($dataUser));
        $mes = date("m", strtotime($dataUser));
        $ano = date("Y", strtotime($dataUser));

        if (!checkdate($mes, $dia, $ano)) {
            return false;
        }
        return true;
    }

    private function validateIdade($dataAniver): bool
    {
        $dataAtual = date("Y/m/d");
        $diaAt = date("d", strtotime($dataAtual));
        $mesAt = date("m", strtotime($dataAtual));
        $anoAt = date("Y", strtotime($dataAtual));

        $diaAniver = date("d", strtotime($dataAniver));
        $mesAniver = date("m", strtotime($dataAniver));
        $anoAniver = date("Y", strtotime($dataAniver));

        $age = $anoAt - $anoAniver;
        $m = $mesAt - $mesAniver;
        if ($m < 0 || ($m === 0 && $dataAtual < $dataAniver)) {
            $age--;
        }
        if ($age >= 18) {
            return true;
        }

        return false;
    }

    public function validateBusca($busca)
    {

        $banco = new VeiculoDAO();
        $emprestimo = new EmprestimoDAO();
        $resultado = $banco->readByAvailableDate($busca['data_emprestimo']);

        if ($this->isEmpty($busca)) {
            $this->messages[] = 'Todos os campos devem ser preenchidos';
        } elseif (!$resultado) {
            $this->messages[] = 'Nenhum carro encontrado';
        } elseif (strtotime($busca['data_emprestimo']) > strtotime($busca['data_entrega'])) {
            $this->messages[] = 'Data de entrega deve ser após o empréstimo';
        }

        return isset($this->messages);
    }
}
