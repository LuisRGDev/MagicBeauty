<?php
require_once 'app/Database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    // Check if regular user exists
    $stmt = $db->query("SELECT COUNT(*) FROM users WHERE username = 'user'");
    if ($stmt->fetchColumn() == 0) {
        // Create regular user
        // Password: user123
        $hashedPassword = password_hash('user123', PASSWORD_DEFAULT);
        
        $insert = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
        $stmt = $db->prepare($insert);
        $stmt->execute([
            'username' => 'user',
            'password' => $hashedPassword,
            'role' => 'user'
        ]);
        
        echo "Regular user created.\n";
        echo "Username: user\n";
        echo "Password: user123\n";
    } else {
        echo "Regular user already exists.\n";
    }
    
    // List all users
    echo "\nAll users in database:\n";
    $stmt = $db->query("SELECT username, role FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- " . $row['username'] . " (role: " . $row['role'] . ")\n";
    }
} else {
    echo "Could not connect to database.\n";
}
