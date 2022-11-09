<?php
namespace app\controllers;

use PageController;
use app\models\UsuarioDAO;
use app\controllers\Validate;

class LoginController extends PageController
{
    public function __construct()
    {
        parent::__construct(new UsuarioDAO(), 'login');
    }

    public function saveLogin(): void {
        $validator = new Validate();
        $autenticador = new Autenticador();
        $usuario = $autenticador->realizarLogin($_POST);

        if(isset($_POST['email']) || isset($_POST['senha'])) {
            if(!$validator->validateLogin($_POST, $usuario)){
                $nome = $_SESSION['nome'];
                if($nome == "adm"){
                    redirect('/admin/carros/read');
                } else
                    redirect('/');
            }
            else{
                $_SESSION['message'] = $validator->buildList();
                redirect('/login');
            }
        }
    }

    public function saveLogout():void {
        session_start();
        session_destroy();

        redirect('/');
    }

    public function saveRegister():void {

        $validator = new Validate();

        if(!$validator->validateUsuario($_POST)) {
            unset($_POST['cadastro']);
            $_SESSION['message'] = 'Cadastro realizado com sucesso!';
            $banco = new UsuarioDAO();
            $banco->create($_POST);
            redirect('Location: /login');
    
        } else {
            $_SESSION['message'] = $validator->buildList();
            redirect('Location: /cadastro');
        }
    }
}