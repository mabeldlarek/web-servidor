<?php

use Pecee\Http\Request;

class AuthProfile extends Auth
{

    public function handle(Request $request): void
    {
        Auth::handle($request);

        // Verifica se o usuário está acessando a sua própria página
        if($_SESSION['id_usuario'] != explode('/', $request->getUrl()->getPath())[3]) {
            $request->setRewriteUrl(url('home_page'));
        }
    }
}