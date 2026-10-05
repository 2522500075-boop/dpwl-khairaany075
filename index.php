<?php
require_once 'config/autoload.php';
require_once 'config/routes.php';

$url = $_GET['url'] ?? $route['default_controller'] . '/index';
if ($url == '') {
    // $url = $route['default_controller']. '/index';
}

$url = trim($url, '/');
$segment = explode('/', $url);
$controller = $segment[0]?? $route['default_controller'];
$method = $segment[1]?? 'index';
$parameter = $segment[2]?? null;

$controllerName = ucfirst($controller);
$controllerName = ucfirst($segment[0]);
$controllerFile = 'controller/'. $controllerName. '.php';
// if (file_exists($controllerFile)) {
// require_once $controllerFile;
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
// } else {
// echo "Controller tidak ditemukan.";
// }