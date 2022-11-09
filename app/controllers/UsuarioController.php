<?php

namespace app\controllers;

use app\controllers\AdminController;
use app\models\UsuarioDAO;

class UsuarioController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new UsuarioDAO(), 'usuario');
    }

    public function saveCreate(): void {

        if(!$this->validator->validateUsuario($_POST)) {

            $_SESSION['message'] = 'Usuario criado com sucesso!';
            $this->banco->create($_POST);
            redirect('/admin/usuarios/read');
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            redirect('/admin/usuarios/create');
        }
    }

    public function saveUpdate(): void {

        if(!$this->validator->validateUsuario($_POST)) {

            $_SESSION['message'] = 'Usuário editado com sucesso!';
    
            if(isset($_POST['pessoal'])) {
                $this->banco->update($_POST['id_usuario'], array_slice($_POST, 2));
                redirect('/perfil/editar/' . $_POST['id_usuario']);
            } else {
                $this->banco->update($_POST['id_usuario'], array_slice($_POST, 1));
                redirect('/admin/usuarios/read');
            }
    
        } else {
    
            $_SESSION['message'] = $this->validator->buildList();
            if(isset($_POST['pessoal'])) {
                redirect('/perfil/editar/' . $_POST['id_usuario']);
            } else {
                redirect('/admin/usuarios/update/' . $_POST['id_usuario']);
            }
        }
    }
}
