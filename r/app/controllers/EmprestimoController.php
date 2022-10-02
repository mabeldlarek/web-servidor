<?php

class EmprestimoController extends AdminController
{
    public function __construct()
    {
        parent::__construct(new EmprestimoDAO(), 'emprestimo');
    }

    public function delete(mixed $id): void
    {
        $this->banco->delete($id);

        $_SESSION['message'] = 'Exclusão realizada com sucesso!';

        header('Location: /?page=perfil&action=read');
    }
}