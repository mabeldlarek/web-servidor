<?php

use app\models\EmprestimoDAO;
use app\controllers\AdminController;

class EmprestimoController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new EmprestimoDAO(), 'emprestimo');
    }

    public function delete(mixed $id): void
    {
        $this->banco->delete($id);

        $_SESSION['message'] = 'Reserva Cancelada!';

        redirect('/perfil/editar/' . $_SESSION['id_usuario']);
    }

}