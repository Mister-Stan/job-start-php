<?php
require __DIR__ . '/../src/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

use Framework\Router;
use Framework\Session;

Session::start();

require __DIR__ . '/../src/helpers.php';

// Instantiating the router
$router = new Router();

// Get routes
$routes = require __DIR__ . '/../src/routes.php';

// Get current URI and HTTP method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$router->route($uri);