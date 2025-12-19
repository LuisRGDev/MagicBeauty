<?php
require_once __DIR__ . '/Database.php';

class Auth {
    private $conn;
    
    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    public function login($username, $password) {
        $query = "SELECT * FROM users WHERE username = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$username]);
        
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        
        if ($user && password_verify($password, $user->password)) {
            session_start();
            $_SESSION['user_id'] = $user->id;
            $_SESSION['username'] = $user->username;
            $_SESSION['role'] = $user->role;
            return true;
        }
        
        return false;
    }
    
    public function logout() {
        session_start();
        session_destroy();
    }
    
    public function isLoggedIn() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['user_id']);
    }
    
    public function isAdmin() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
    }
    
    
    public function getUser() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if ($this->isLoggedIn()) {
            return (object)[
                'id' => $_SESSION['user_id'],
                'username' => $_SESSION['username'],
                'role' => $_SESSION['role']
            ];
        }
        return null;
    }
    
    public function register($username, $email, $password) {
        try {
            // Check if username already exists
            $query = "SELECT COUNT(*) FROM users WHERE username = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() > 0) {
                return 'El nombre de usuario ya está en uso';
            }
            
            // Check if email already exists
            $query = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);
            if ($stmt->fetchColumn() > 0) {
                return 'El correo electrónico ya está registrado';
            }
            
            // Create user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, 'user')";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$username, $email, $hashedPassword]);
            
            return true;
        } catch (PDOException $e) {
            return 'Error al crear la cuenta: ' . $e->getMessage();
        }
    }
}
