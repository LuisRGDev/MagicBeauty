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
}
