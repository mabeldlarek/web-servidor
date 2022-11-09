<?php
namespace app\controllers;

use app\models\EmprestimoDAO;
use app\models\UsuarioDAO;
use PublicController;

class ProfileController extends PublicController
{

    public function __construct()
    {
        parent::__construct('perfil' ,  new EmprestimoDAO());
    }

    public function saveUpdate(): void {

        if(!$this->validator->validateUsuario($_POST)) {

            $_SESSION['message'] = 'Usuário editado com sucesso!';
            $banco = new UsuarioDAO();
        
            if(isset($_POST['pessoal'])) {
                $banco->update($_POST['id_usuario'], array_slice($_POST, 2));
                redirect('/perfil/editar/' . $_POST['id_usuario']);
            } else {
                $banco->update($_POST['id_usuario'], array_slice($_POST, 1));
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