<?php

function AutoLoadRegister()
{
    spl_autoload_register(function ($class) {
        $directories = [
            'Controllers' => __DIR__ . '/../app/Controllers/',
            'Models' => __DIR__ . '/../app/Models/',
            'Core' => __DIR__ . '/../core/'
        ];

        foreach ($directories as $namespace => $directory) {
            $file = $directory . $class . '.php';
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
        }

        return false;
    });
}
