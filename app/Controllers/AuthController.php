<?php
require_once __DIR__ . '/../Auth.php';

class AuthController {
    private $auth;
    
    public function __construct() {
        $this->auth = new Auth();
    }
    
    public function showLogin() {
        // If already logged in, redirect
        if ($this->auth->isLoggedIn()) {
            if ($this->auth->isAdmin()) {
                header('Location: /admin/cursos');
            } else {
                header('Location: /cursos');
            }
            exit;
        }
        
        return view('auth.login');
    }
    
    public function login() {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        
        if ($this->auth->login($username, $password)) {
            if ($this->auth->isAdmin()) {
                header('Location: /admin/cursos');
            } else {
                header('Location: /cursos');
            }
            exit;
        } else {
            return view('auth.login', ['error' => 'Credenciales incorrectas']);
        }
    }
    
    
    public function logout() {
        $this->auth->logout();
        header('Location: /');
        exit;
    }
    
    public function showRegister() {
        // If already logged in, redirect
        if ($this->auth->isLoggedIn()) {
            if ($this->auth->isAdmin()) {
                header('Location: /admin/cursos');
            } else {
                header('Location: /cursos');
            }
            exit;
        }
        
        return view('auth.register');
    }
    
    public function register() {
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';
        
        // Validation
        if (empty($username) || empty($email) || empty($password)) {
            return view('auth.register', ['error' => 'Todos los campos son requeridos']);
        }
        
        if (strlen($password) < 8) {
            return view('auth.register', ['error' => 'La contraseña debe tener al menos 8 caracteres']);
        }
        
        if ($password !== $passwordConfirm) {
            return view('auth.register', ['error' => 'Las contraseñas no coinciden']);
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return view('auth.register', ['error' => 'El correo electrónico no es válido']);
        }
        
        // Try to register
        $result = $this->auth->register($username, $email, $password);
        
        if ($result === true) {
            // Auto-login after registration
            $this->auth->login($username, $password);
            header('Location: /cursos');
            exit;
        } else {
            return view('auth.register', ['error' => $result]);
        }
    }
}
