<?php

class Router {
    protected $routes = [];

    public function get($uri, $callback) {
        $this->routes['GET'][$uri] = $callback;
        return $this;
    }

    public function post($uri, $callback) {
        $this->routes['POST'][$uri] = $callback;
        return $this;
    }

    public function name($name) {
        // Placeholder for named routes
        return $this;
    }

    public function dispatch() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        // Remove project folder from URI
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        if (strpos($uri, $scriptName) === 0) {
            $uri = substr($uri, strlen($scriptName));
        }
        $uri = '/' . trim($uri, '/');

        // Check for exact match first
        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            if (is_callable($callback)) {
                echo call_user_func($callback);
                return;
            }
        }

        // Check for regex match
        foreach ($this->routes[$method] as $route => $callback) {
            // Convert route params {id} to regex
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([a-zA-Z0-9_]+)', $route);
            $pattern = "@^" . $pattern . "$@D";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // Remove full match
                if (is_callable($callback)) {
                    echo call_user_func_array($callback, $matches);
                    return;
                }
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }
}

function view($view, $data = []) {
    extract($data);
    $viewPath = __DIR__ . '/../resources/views/' . str_replace('.', '/', $view) . '.blade.php';
    if (file_exists($viewPath)) {
        ob_start();
        include $viewPath;
        return ob_get_clean();
    }
    return "View [$view] not found.";
}

function asset($path) {
    // Basic asset helper
    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    if ($scriptName === '/') {
        $scriptName = '';
    }
    return $scriptName . '/' . trim($path, '/');
}

function route($name) {
    // Named routes map
    $namedRoutes = [
        'home'     => '/',
        'pestanas' => '/pestanas',
        'faciales' => '/faciales',
        'micorp'   => '/micorp',
        'cursos'   => '/cursos',
        'login'    => '/login',
        'register' => '/register',
        'logout'   => '/logout',
    ];

    $scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));

    // If we are at the root (e.g. built-in server), dirname is '/' or empty.
    if ($scriptName === '/' || $scriptName === '.') {
        $base = '';
    } else {
        $base = $scriptName;
    }

    // If the name is known, return base + named URI
    if (isset($namedRoutes[$name])) {
        $uri = $namedRoutes[$name];
        if ($uri === '/') {
            return $base ?: '/';
        }
        return $base . $uri;
    }

    // Fallback: return base path (old behaviour)
    return $base ?: '/';
}

