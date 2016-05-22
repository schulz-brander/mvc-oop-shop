<?php
// FRONT CONTROLLER

// Отображаем On или скрываем Off все ошибки
ini_set('display_errors', 'Off'); 
error_reporting(E_ALL);

session_start();

// Подключение автозагрузчика
define('ROOT', dirname(__FILE__));
require_once (ROOT . '/components/Autoload.php');

// Вызовываем роутинг
$router = new Router();
$router->run();