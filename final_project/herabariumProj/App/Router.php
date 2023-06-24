<?php

class Router {
    protected $routes = [];

    public function addRoute($uri, $controller, $method) {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'only' => null
        ];
        return $this;
    }

    public function get($uri, $controller) {
        return $this->addRoute($uri, $controller, 'GET');
    }
    public function put($uri, $controller) {
        return $this->addRoute($uri, $controller, 'PUT');
    }
    public function post($uri, $controller) {
        return $this->addRoute($uri, $controller, 'POST');
    }
    public function only($key) {
        $this->routes[array_key_last($this->routes)]['only'] = $key;
    }
    public function getRoutePathVariables($uri) {
        preg_match_all('({[^}]+})', $uri, $tmp);

        $matches = [];

        foreach ($tmp[0] as $match) {
            $match = str_replace(['{', '}'], '', $match);

            $matches[] = $match;
        }
        return $matches;
    }
    protected function abort($code) {
        http_response_code($code);
        require basePath("views/_{$code}.view.html");
        die();
    }
    protected function matchRouteToUri($route, $uri) {
        $explodedRoute = explode('/', $route);
        $explodedUri = explode('/', $uri);
        if (sizeof($explodedRoute) != sizeof($explodedUri))
            return false;

        $routeVars = $this->getRoutePathVariables($route);
        $currVar = 0;
        $rez = [];
        // dd($uri);

        for ($i = 0; $i < sizeof($explodedRoute); $i++) {
            if ($explodedRoute[$i] != $explodedUri[$i]) {
                if (!in_array(trim($explodedRoute[$i], '{}'), $routeVars)) {
                    return false;
                }
                $rez[$routeVars[$currVar++]] = $explodedUri[$i];
            }
        }
        return $rez;
    }
    public function route($uri, $method) {
        foreach ($this->routes as $route) {

            if ($route['method'] == $method) {
                $pathVars = $this->matchRouteToUri($route['uri'], $uri);
                if ($pathVars !== false) {
                    if ($route['only']) {
                        if (!isset($_SESSION['username'])) {
                            $this->abort(403);
                        }
                    }
                    // if the uri contains numbers, try to match it to a route and create an array for path variables
                    return require basePath($route['controller']);
                }
            }
        }

        $this->abort(404);
    }
}