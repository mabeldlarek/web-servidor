<?php

// Verifica se o usuário logado é admin

require APP_ROOT . '/resources/helpers/auth/auth.php';

if($_SESSION['nome'] != 'adm') {
    header('Location: /?page=home&action=home');
}
