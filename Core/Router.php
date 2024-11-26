<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get($uri, $controller)
    {
        return $this->add(
            uri: $uri,
            controller: $controller,
            method: 'GET'
        );
    }

    public function post($uri, $controller)
    {
        return $this->add(
            uri: $uri,
            controller: $controller,
            method: 'POST'
        );
    }

    public function delete($uri, $controller)
    {
        return $this->add(
            uri: $uri,
            controller: $controller,
            method: 'DELETE'
        );
    }

    public function patch($uri, $controller)
    {
        return $this->add(
            uri: $uri,
            controller: $controller,
            method: 'PATCH'
        );
    }

    public function put($uri, $controller)
    {
        return $this->add(
            uri: $uri,
            controller: $controller,
            method: 'PUT'
        );
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require BASE_PATH . "/Http/Controllers/" . $route['controller'];
            }
        }
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        // require bv("views/{$code}.php");

        die();
    }

}
