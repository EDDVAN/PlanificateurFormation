<?php

class Router
{
    private static $routes = [];
    private static $baseUrl;

    public static function init()
    {
        global $config;
        self::$baseUrl = rtrim(parse_url($config['app']['url'], PHP_URL_PATH), '/');
    }

    public static function get($path, $callback, $middleware = [])
    {
        self::$routes[] = new Route('GET', $path, $callback, $middleware);
    }

    public static function post($path, $callback, $middleware = [])
    {
        self::$routes[] = new Route('POST', $path, $callback, $middleware);
    }

    public static function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Remove base URL from path if it exists
        if (!empty(self::$baseUrl) && strpos($path, self::$baseUrl) === 0) {
            $path = substr($path, strlen(self::$baseUrl));
        }

        // Ensure path starts with /
        $path = '/' . ltrim($path, '/');

        foreach (self::$routes as $route) {
            if ($route->matches($method, $path)) {
                try {
                    echo $route->execute($path);
                    return;
                } catch (Exception $e) {
                    throw $e;
                }
            }
        }

        header('location: /404');
    }
}
