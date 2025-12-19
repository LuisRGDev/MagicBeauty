<?php
require_once 'app/Database.php';

$database = new Database();
$conn = $database->getConnection();

try {
    // Fix admin role
    $conn->exec("UPDATE users SET role = 'admin' WHERE username = 'admin'");
    echo "Fixed admin role\n";
    
    // Update user emails to be more realistic
    $conn->exec("UPDATE users SET email = 'admin@magicbeauty.com' WHERE username = 'admin'");
    $conn->exec("UPDATE users SET email = 'user@magicbeauty.com' WHERE username = 'user'");
    echo "Updated emails\n";
    
    // List all users
    echo "\nCurrent users:\n";
    $stmt = $conn->query("SELECT id, username, email, role FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- ID: {$row['id']}, Username: {$row['username']}, Email: {$row['email']}, Role: {$row['role']}\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
