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
