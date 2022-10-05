<?php

// Verifica se o usuário está acessando a sua própria página

require APP_ROOT . '/resources/helpers/auth/auth.php';

if($_SESSION['id_usuario'] != $_GET['id']) {
    header('Location: /?page=home&action=home');
}

