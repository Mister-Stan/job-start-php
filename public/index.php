<?php
require __DIR__ . '/../vendor/autoload.php';
require '../helpers.php';

use Framework\Router;

// spl_autoload_register(function ($class) {
//     require basePath('Framework/' . $class . '.php');
//     if(file_exists($path)) {
//         require $path;
//     }
// });

// Instantianting the router
$router = new Router();

// Get routes
$routes = require basePath('routes.php');

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/test-project/workopia/public', '', $uri);


// Route the request
$router->route($uri);
