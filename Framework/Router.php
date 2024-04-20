<?php

namespace Framework;

use App\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    /**
     * Add a new route
     * 
     * @param string $method
     * @param string $uri
     * @param string $action
     * @return void
     */
    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add a GET route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }

    /**
     * Add a PUT route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }

    /**
     * Add a DELETE route
     * 
     * @param string $uri
     * @param string $controller
     * @return void
     */
    public function delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }


   /**
 * Route the request
 *
 * @param string $uri
 * @return void
 */
    public function route($uri)
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $params = [];

        foreach ($this->routes as $route) {
            $uriSegments = explode('/', trim($uri, '/'));
            $routeSegments = explode('/', trim($route['uri'], '/'));

            if (count($uriSegments) !== count($routeSegments)) {
                continue;
            }

            $match = true;
            for ($i = 0; $i < count($uriSegments); $i++) {
                if (strpos($routeSegments[$i], '{') === 0 && strpos($routeSegments[$i], '}') === strlen($routeSegments[$i]) - 1) {
                    $paramName = trim($routeSegments[$i], '{}');
                    $params[$paramName] = $uriSegments[$i];
                } elseif ($routeSegments[$i] !== $uriSegments[$i]) {
                    $match = false;
                    break;
                }
            }

            if ($match && $route['method'] === $requestMethod) {
                $controller = 'App\\Controllers\\' . $route['controller'];
                $controllerMethod = $route['controllerMethod'];
                $controllerInstance = new $controller();
                $controllerInstance->$controllerMethod($params);
                return;
            }
        }

        ErrorController::notFound();
    }
 }