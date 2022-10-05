<?php
//Nome do site
const SITE_NAME = 'AluCAR';

session_start();

//Root
define('APP_ROOT', dirname(__FILE__, 2));
const URL_ROOT = '/';
const URL_SUBFOLDER = '';

//Parametos do Banco
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_NAME = 'carros';


//Autoload de Classes
require_once APP_ROOT . '/app/models/DAO/ModelDAO.php';
require_once APP_ROOT . '/app/models/DAO/VeiculoDAO.php';
require_once APP_ROOT . '/app/models/DAO/EmpresaDAO.php';
require_once APP_ROOT . '/app/models/DAO/EmprestimoDAO.php';
require_once APP_ROOT . '/app/models/DAO/UsuarioDAO.php';
require_once APP_ROOT . '/app/models/DAO/ImagemDAO.php';
require_once APP_ROOT . '/app/controllers/Validate.php';
require_once APP_ROOT . '/app/controllers/Autenticador.php';
require_once APP_ROOT . '/app/controllers/AdminController.php';
require_once APP_ROOT . '/app/controllers/VeiculoController.php';
require_once APP_ROOT . '/app/controllers/EmpresaController.php';
require_once APP_ROOT . '/app/controllers/UsuarioController.php';
require_once APP_ROOT . '/app/controllers/PageController.php';
require_once APP_ROOT . '/app/controllers/HomeController.php';
require_once APP_ROOT . '/app/controllers/AdminController.php';
require_once APP_ROOT . '/app/controllers/PublicController.php';
require_once APP_ROOT . '/app/controllers/VeiculoController.php';
require_once APP_ROOT . '/app/controllers/EmpresaController.php';
require_once APP_ROOT . '/app/controllers/UsuarioController.php';
require_once APP_ROOT . '/app/controllers/CarPageController.php';
require_once APP_ROOT . '/app/controllers/ReservaController.php';
require_once APP_ROOT . '/app/controllers/LoginController.php';
require_once APP_ROOT . '/app/controllers/ProfileController.php';
require_once APP_ROOT . '/app/controllers/EmprestimoController.php';
