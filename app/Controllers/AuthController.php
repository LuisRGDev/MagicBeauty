<?php
require_once __DIR__ . '/../Auth.php';
require_once __DIR__ . '/../Session.php';

class AuthController {
    private $auth;
    
    public function __construct() {
        $this->auth = new Auth();
    }
    
    public function showLogin() {
        if ($this->auth->isLoggedIn()) {
            $this->redirectByRole();
        }
        return view('auth.login', [
            'csrf'     => Session::generateCsrfToken(),
            'redirect' => $_GET['redirect'] ?? ''
        ]);
    }
    
    public function login() {
        // Verify CSRF token
        $token = $_POST['_csrf'] ?? '';
        if (!Session::verifyCsrfToken($token)) {
            return view('auth.login', [
                'error'    => 'Token de seguridad inválido. Recarga la página e intenta de nuevo.',
                'csrf'     => Session::generateCsrfToken(),
                'redirect' => $_POST['redirect'] ?? ''
            ]);
        }

        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $redirect = $_POST['redirect'] ?? '';

        if ($this->auth->login($username, $password)) {
            // Admin always goes to admin panel
            if ($this->auth->isAdmin()) {
                header('Location: ' . asset('admin/cursos'));
                exit;
            }
            // Redirect to original destination if valid, else dashboard
            $allowed = ['/cursos', '/dashboard'];
            if (!empty($redirect) && in_array($redirect, $allowed)) {
                header('Location: ' . asset(ltrim($redirect, '/')));
            } else {
                header('Location: ' . asset('dashboard'));
            }
            exit;
        } else {
            return view('auth.login', [
                'error'    => 'Usuario o contraseña incorrectos',
                'csrf'     => Session::generateCsrfToken(),
                'redirect' => $redirect
            ]);
        }
    }
    
    public function logout() {
        $this->auth->logout();
        header('Location: ' . asset('/'));
        exit;
    }
    
    public function showRegister() {
        if ($this->auth->isLoggedIn()) {
            $this->redirectByRole();
        }
        return view('auth.register', ['csrf' => Session::generateCsrfToken()]);
    }
    
    public function register() {
        // Verify CSRF token
        $token = $_POST['_csrf'] ?? '';
        if (!Session::verifyCsrfToken($token)) {
            return view('auth.register', [
                'error' => 'Token de seguridad inválido. Recarga la página e intenta de nuevo.',
                'csrf'  => Session::generateCsrfToken()
            ]);
        }

        $username        = trim($_POST['username'] ?? '');
        $email           = trim($_POST['email'] ?? '');
        $password        = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';
        
        if (empty($username) || empty($email) || empty($password)) {
            return view('auth.register', [
                'error' => 'Todos los campos son requeridos',
                'csrf'  => Session::generateCsrfToken()
            ]);
        }
        
        if (strlen($password) < 8) {
            return view('auth.register', [
                'error' => 'La contraseña debe tener al menos 8 caracteres',
                'csrf'  => Session::generateCsrfToken()
            ]);
        }
        
        if ($password !== $passwordConfirm) {
            return view('auth.register', [
                'error' => 'Las contraseñas no coinciden',
                'csrf'  => Session::generateCsrfToken()
            ]);
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return view('auth.register', [
                'error' => 'El correo electrónico no es válido',
                'csrf'  => Session::generateCsrfToken()
            ]);
        }
        
        $result = $this->auth->register($username, $email, $password);
        
        if ($result === true) {
            $this->auth->login($username, $password);
            header('Location: ' . asset('dashboard'));
            exit;
        } else {
            return view('auth.register', [
                'error' => $result,
                'csrf'  => Session::generateCsrfToken()
            ]);
        }
    }

    public function dashboard() {
        if (!$this->auth->isLoggedIn()) {
            header('Location: ' . asset('login'));
            exit;
        }
        // Admins shouldn't end up here
        if ($this->auth->isAdmin()) {
            header('Location: ' . asset('admin/cursos'));
            exit;
        }
        return view('user.dashboard');
    }

    private function redirectByRole() {
        if ($this->auth->isAdmin()) {
            header('Location: ' . asset('admin/cursos'));
        } else {
            header('Location: ' . asset('dashboard'));
        }
        exit;
    }
}
