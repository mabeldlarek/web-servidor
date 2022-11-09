<?php

use Pecee\Http\Request;

class AuthAdmin extends Auth
{

    public function handle(Request $request): void
    {
        Auth::handle($request);

        // Verifica se o usuário logado é admin
        if($_SESSION['nome'] != 'adm') {
            $request->setRewriteUrl(url('home_page'));
        }
    }
}