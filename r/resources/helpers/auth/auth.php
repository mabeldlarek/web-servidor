<?php

// verifica se o usuário está logado
if(!isset($_SESSION['id_usuario'])) {
    header('Location: /?page=home&action=home');
}