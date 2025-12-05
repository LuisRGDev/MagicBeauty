<?php

// Handle PHP built-in server
if (php_sapi_name() === 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];
    if (is_file($file)) {
        return false;
    }
}

require_once __DIR__ . '/../app/Router.php';

$router = new Router();

require_once __DIR__ . '/../routes/web.php';

$router->dispatch();
