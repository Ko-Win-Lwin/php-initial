<?php
// namespaces
use Core\Router;




// constants
const BASE_PATH = __DIR__ . "/../";




// require
require BASE_PATH . 'Core/function.php';
require base_path(path: 'vendor/autoload.php');




$router = new Router();
require base_path(path: 'routes.php');



$uri = parse_url(url: $_SERVER['REQUEST_URI'], component: PHP_URL_PATH);
// Remove any folder segments, so you only get '/'. for local enviroment
if ($uri !== '/' && strpos($uri, '/') === 0) {
    $uri = '/';
}

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


$router->route(uri: $uri, method: $method);

