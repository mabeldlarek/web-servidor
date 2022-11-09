<?php

namespace app\controllers;

use app\controllers\AdminController;
use app\models\EmpresaDAO;
use app\models\ImagemDAO;
use app\models\VeiculoDAO;

class VeiculoController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new VeiculoDAO(), 'veiculo');
    }

    public function read(): void
    {
        $bancoImages = new ImagemDAO();

        $images = $bancoImages->readByVeiculo();
        $tuples = $this->banco->read();

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/list' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function update($id): void
    {
        $bancoImages = new ImagemDAO();
        $bancoEmpreas = new EmpresaDAO();

        $images =  $bancoImages->readByVeiculo();
        $empresas = $bancoEmpreas->read();

        $tuple = $this->banco->read($id);

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/edit' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function create(): void
    {
        $bancoEmpreas = new EmpresaDAO();
        $empresas = $bancoEmpreas->read();

        $page = APP_ROOT . '/resources/views/admin/' . $this->tipo . '/create' . $this->tipo . '.view.php';
        require APP_ROOT . '/resources/views/layout/mainlayout.view.php';
    }

    public function saveCreate(): void {

        if(!$this->validator->validateVeiculo($_POST)) {

            $_SESSION['message'] = 'Veículo criado com sucesso!';
            $_POST['placa'] = strtoupper($_POST['placa']);
            $banco = new VeiculoDAO();
    
            // Validação e create de imagem se tiver
            if(($_FILES['imagem']['tmp_name'] != null) && ($_POST['desc'] != null)) {
    
                $imagens = new ImagemDAO();
                $imagem = $_FILES['imagem']['tmp_name'];
                $imgContent = addslashes(file_get_contents($imagem));
                $desc = $_POST['desc'];
    
                unset($_POST['imagem'], $_POST['desc']);
                $banco->create($_POST);
                $imagens->create(array($desc, $imgContent, $banco->readLastId()[0]));
    
            } else {
    
                unset($_POST['imagem'], $_POST['desc']);
                $banco->create($_POST);
            }
    
            redirect('/admin/carros/read');
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            redirect('/admin/carros/create');
        }
    }

    public function saveUpdate(): void {

        if(!$this->validator->validateVeiculo($_POST)) {

            $_SESSION['message'] = 'Veículo editado com sucesso!';
            $_POST['placa'] = strtoupper($_POST['placa']);
    
            // Validação e update de imagem se tiver
            if(($_FILES['imagem']['tmp_name'] != null) && ($_POST['desc'] != null)) {
    
                $imagens = new ImagemDAO();
                $imagem = $_FILES['imagem']['tmp_name'];
                $imgContent = addslashes(file_get_contents($imagem));
                $desc = $_POST['desc'];
    
                unset($_POST['imagem'], $_POST['desc']);
                $this->banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
                if(isset($imagens->readByVeiculo()[$_POST['id_veiculo']])) {
                    $imagens->update($imagens->readByVeiculo()[$_POST['id_veiculo']][2], array("descricao" => $desc, "imagem" => $imgContent, "id_veiculo" => $_POST['id_veiculo']));
                } else {
                    $imagens->create(array($desc, $imgContent, $_POST['id_veiculo']));
                }
    
            } else {
    
                unset($_POST['imagem'], $_POST['desc']);
                $this->banco->update($_POST['id_veiculo'], array_slice($_POST, 1));
            }
    
            redirect('/admin/carros/read');
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            redirect('/admin/carros/update/' . $_POST['id_veiculo']);
        }
    }
}
