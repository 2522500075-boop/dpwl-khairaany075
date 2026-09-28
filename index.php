<?php
require_once 'config/routes.php';
$url1 = $_GET['url']?? '';
if ($url1 == '') {
    $url1 = $route['default_controller']. '/index';
}
$url1 = trim($url1, '/');
$segment = explode('/', $url1);
$controller = $segment[0]?? $route['default_controller'];
$method = $segment[1]?? 'index';
$parameter = $segment[2]?? null;

$controllerName = ucfirst($controller);
$controllerFile = 'controller/'. $controllerName . '.php';
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
        echo "Method tidak ditemukan.";
    }
} else {
    echo "Controller tidak ditemukan.";
}