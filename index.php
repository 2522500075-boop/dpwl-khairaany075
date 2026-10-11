<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';
require_once 'config/config.php';
require_once 'helper/url_helper.php';

$url = $_GET['url']?? $route['default_controller']. '/index';
$url = trim($url, '/');
$segment = explode('/', $url);
$controller = $segment[0]?? $route['default_controller'];
$method = $segment[1]?? 'index';
$parameter = $segment[2]?? null;

// Biar Login_C tetap Login_C, bukan jadi Login_c
$controllerName = $controller;
if (strtolower($controller) === 'login_c') {
    $controllerName = 'Login_C';
} else {
    $controllerName = ucfirst($controller);
}

$controllerFile = 'controller/'. $controllerName. '.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $objController = new $controllerName();
    if (method_exists($objController, $method)) {
        if ($parameter!== null) {
            $objController->$method($parameter);
        } else {
            $objController->$method();
        }
    } else {
        echo "Method $method tidak ditemukan di $controllerName";
    }
} else {
    echo "Controller file tidak ditemukan: $controllerFile";
}