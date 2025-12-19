<?php
require_once __DIR__ . '/../Auth.php';
require_once __DIR__ . '/../Database.php';

class UserController {
    private $auth;
    private $conn;
    
    public function __construct() {
        $this->auth = new Auth();
        $database = new Database();
        $this->conn = $database->getConnection();
    }
    
    private function requireAdmin() {
        if (!$this->auth->isAdmin()) {
            header('Location: /');
            exit;
        }
    }
    
    public function index() {
        $this->requireAdmin();
        
        // Get all users
        $query = "SELECT id, username, email, role, created_at FROM users ORDER BY created_at DESC";
        $stmt = $this->conn->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        
        return view('admin.users.index', ['users' => $users]);
    }
    
    public function create() {
        $this->requireAdmin();
        return view('admin.users.create');
    }
    
    public function store() {
        $this->requireAdmin();
        
        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $role = $_POST['role'] ?? 'user';
        
        // Validation
        if (empty($username) || empty($email) || empty($password)) {
            return view('admin.users.create', ['error' => 'Todos los campos son requeridos']);
        }
        
        if (strlen($password) < 8) {
            return view('admin.users.create', ['error' => 'La contraseña debe tener al menos 8 caracteres']);
        }
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return view('admin.users.create', ['error' => 'El correo electrónico no es válido']);
        }
        
        if (!in_array($role, ['user', 'admin'])) {
            return view('admin.users.create', ['error' => 'Rol inválido']);
        }
        
        try {
            // Check if username already exists
            $query = "SELECT COUNT(*) FROM users WHERE username = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$username]);
            if ($stmt->fetchColumn() > 0) {
                return view('admin.users.create', ['error' => 'El nombre de usuario ya está en uso']);
            }
            
            // Check if email already exists
            $query = "SELECT COUNT(*) FROM users WHERE email = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$email]);
            if ($stmt->fetchColumn() > 0) {
                return view('admin.users.create', ['error' => 'El correo electrónico ya está registrado']);
            }
            
            // Create user
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$username, $email, $hashedPassword, $role]);
            
            header('Location: /admin/users');
            exit;
        } catch (PDOException $e) {
            return view('admin.users.create', ['error' => 'Error al crear el usuario: ' . $e->getMessage()]);
        }
    }
    
    public function delete($id) {
        $this->requireAdmin();
        
        try {
            // Check if this is the last admin
            $query = "SELECT COUNT(*) FROM users WHERE role = 'admin'";
            $adminCount = $this->conn->query($query)->fetchColumn();
            
            // Check if the user to delete is an admin
            $query = "SELECT role FROM users WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            
            if ($user && $user->role === 'admin' && $adminCount <= 1) {
                header('Location: /admin/users?error=' . urlencode('No se puede eliminar el último administrador'));
                exit;
            }
            
            // Delete user
            $query = "DELETE FROM users WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            $stmt->execute([$id]);
            
            header('Location: /admin/users');
            exit;
        } catch (PDOException $e) {
            header('Location: /admin/users?error=' . urlencode('Error al eliminar el usuario'));
            exit;
        }
    }
}
