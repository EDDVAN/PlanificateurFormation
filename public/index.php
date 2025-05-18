<?php

// Prepare our environment

define('ROOT_DIR', dirname(__DIR__));

session_start([
    'cookie_httponly' => true,
    'cookie_secure' => isset($_SERVER['HTTPS']),
    'cookie_samesite' => 'Lax'
]);

require_once ROOT_DIR . '/core/AutoLoader.php';
AutoloadRegister();

$config = require_once ROOT_DIR . '/config/Config.php';

$db = Database::getInstance($config['database']);
// load and run the router

Router::init();

require_once ROOT_DIR . '/routes/web.php';

try {
    Router::run();
} catch (Exception $e) {
    echo $e->getMessage();
}
