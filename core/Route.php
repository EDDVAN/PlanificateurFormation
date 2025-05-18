<?php

class Route
{
    private $path;
    private $callback;
    private $middleware;
    private $method;

    public function __construct($method, $path, $callback, $middleware = [])
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $callback;
        $this->middleware = $middleware;
    }

    public function matches($requestMethod, $requestPath)
    {
        if ($this->method !== $requestMethod) {
            return false;
        }

        $pattern = preg_replace('/\{([^\/]+)\}/', '([^\/]+)', $this->path);
        $pattern = '#^' . $pattern . '$#';

        return preg_match($pattern, $requestPath);
    }

    public function execute($requestPath)
    {
        // Extract parameters from path
        $pattern = preg_replace('/\{([^\/]+)\}/', '([^\/]+)', $this->path);
        $pattern = '#^' . $pattern . '$#';

        preg_match($pattern, $requestPath, $matches);
        array_shift($matches); // Remove full match

        // Execute middleware
        foreach ($this->middleware as $middlewareClass) {
            $middleware = new $middlewareClass();
            $middleware->handle();
        }

        // Execute callback
        if (is_array($this->callback)) {
            $controller = new $this->callback[0]();
            $method = $this->callback[1];
            return $controller->$method(...$matches);
        }

        return call_user_func_array($this->callback, $matches);
    }

    public function getCallback()
    {
        return $this->callback;
    }
}
