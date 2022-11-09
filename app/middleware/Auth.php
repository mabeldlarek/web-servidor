<?php

use Pecee\Http\Middleware\IMiddleware;
use Pecee\Http\Request;

class Auth implements IMiddleware
{

    public function handle(Request $request): void
    {
        // verifica se o usuário está logado
        if(!isset($_SESSION['id_usuario'])) {
            $request->setRewriteUrl(url('home_page'));
        }
    }
}