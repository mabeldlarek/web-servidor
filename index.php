<?php

use Pecee\SimpleRouter\SimpleRouter as Router;

// Carregando configurações

require_once 'vendor/autoload.php';
require_once 'vendor/pecee/simple-router/helpers.php';
require_once './config/config.php';
require_once './config/routes.php';

Router::setDefaultNamespace('\app\controllers');

try {
    Router::start();
} catch (Exception $e) {
    echo $e;
}