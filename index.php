<?php
<<<<<<< HEAD
require_once 'config/autoload.php';
require_once 'config/routes.php';

$url = $_GET['url'] ?? $route['default_controller'] . '/index';
if ($url == '') {
    // $url = $route['default_controller']. '/index';
}

$url = trim($url, '/');
$segment = explode('/', $url);
=======
require_once 'config/routes.php';
$url1 = $_GET['url']?? '';
if ($url1 == '') {
    $url1 = $route['default_controller']. '/index';
}
$url1 = trim($url1, '/');
$segment = explode('/', $url1);
>>>>>>> 7a27ddc6eeabb0fbb88cd23a937bdd1be0dcea2c
$controller = $segment[0]?? $route['default_controller'];
$method = $segment[1]?? 'index';
$parameter = $segment[2]?? null;

$controllerName = ucfirst($controller);
<<<<<<< HEAD
$controllerName = ucfirst($segment[0]);
$controllerFile = 'controller/'. $controllerName. '.php';
// if (file_exists($controllerFile)) {
// require_once $controllerFile;
=======
$controllerFile = 'controller/'. $controllerName . '.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
>>>>>>> 7a27ddc6eeabb0fbb88cd23a937bdd1be0dcea2c
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
<<<<<<< HEAD
// } else {
// echo "Controller tidak ditemukan.";
// }
=======
} else {
    echo "Controller tidak ditemukan.";
}
>>>>>>> 7a27ddc6eeabb0fbb88cd23a937bdd1be0dcea2c
