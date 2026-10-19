<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config/autoload.php';
require_once 'config/routes.php';
require_once 'config/config.php';
require_once 'helper/url_helper.php';
require_once 'config/session.php';

$url = $_GET['url']?? $route['default_controller']. '/index';
$url = trim($url, '/');
$segment = explode('/', $url);

// CEK APAKAH URL PAKE FOLDER (c_master/Mobil_C/index) ATAU ENGGAK (Login_C/index)
if (count($segment) >= 2 && is_dir('controller/'. $segment[0])) {
    $folder = $segment[0];
    $controller = $segment[1]?? $route['default_controller'];
    $method = $segment[2]?? 'index';
    $parameter = $segment[3]?? null;
    $controllerFile = 'controller/'. $folder. '/'. $controller. '.php';
    $controllerName = $controller;
} else {
    $controller = $segment[0]?? $route['default_controller'];
    $method = $segment[1]?? 'index';
    $parameter = $segment[2]?? null;
    if (strtolower($controller) === 'login_c') {
        $controllerName = 'Login_C';
    } else {
        $controllerName = ucfirst($controller);
    }
    $controllerFile = 'controller/'. $controllerName. '.php';
}

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
    echo "Controller file tidak ditemukan: $controllerFile - URL kamu: $url";
}