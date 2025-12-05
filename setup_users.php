<?php
require_once 'app/Database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    // Create users table
    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT UNIQUE NOT NULL,
        password TEXT NOT NULL,
        role TEXT DEFAULT 'user',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    try {
        $db->exec($sql);
        echo "Table 'users' created successfully.\n";
        
        // Check if admin exists
        $stmt = $db->query("SELECT COUNT(*) FROM users WHERE username = 'admin'");
        if ($stmt->fetchColumn() == 0) {
            // Create default admin user
            // Password: admin123
            $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
            
            $insert = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
            $stmt = $db->prepare($insert);
            $stmt->execute([
                'username' => 'admin',
                'password' => $hashedPassword,
                'role' => 'admin'
            ]);
            
            echo "Default admin user created.\n";
            echo "Username: admin\n";
            echo "Password: admin123\n";
        } else {
            echo "Admin user already exists.\n";
        }

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "Could not connect to database.\n";
}
