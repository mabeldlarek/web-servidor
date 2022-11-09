<?php

namespace app\controllers;

use app\controllers\AdminController;
use app\models\EmpresaDAO;

class EmpresaController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new EmpresaDAO(), 'empresa');
    }

    public function saveCreate(): void {

        if(!$this->validator->validateEmpresa($_POST)) {

            $_SESSION['message'] = 'Empresa criada com sucesso!';
            $this->banco->create($_POST);
            redirect('/admin/empresas/read');
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            redirect('/admin/empresas/create');
        }
    }

    public function saveUpdate(): void {

        if(!$this->validator->validateEmpresa($_POST)) {

            $_SESSION['message'] = 'Empresa editada com sucesso!';
            $this->banco->update($_POST['id_empresa'], array_slice($_POST, 1));
            redirect('/admin/empresas/read');
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            redirect('/admin/empresas/update/' . $_POST['id_empresa']);
        }
    }
}
