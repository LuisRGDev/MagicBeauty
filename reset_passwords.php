<?php
require_once 'app/Database.php';

$database = new Database();
$conn = $database->getConnection();

try {
    // Reset admin password
    $hashedPassword = password_hash('admin123', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ?, role = 'admin' WHERE username = ?");
    $stmt->execute([$hashedPassword, 'admin']);
    echo "Admin password reset to admin123 and role set to admin\n";
    
    // Reset user password
    $hashedPassword = password_hash('user123', PASSWORD_DEFAULT);
    $stmt = $conn->prepare("UPDATE users SET password = ? WHERE username = ?");
    $stmt->execute([$hashedPassword, 'user']);
    echo "User password reset to user123\n";
    
    // Show all users
    echo "\nAll users:\n";
    $stmt = $conn->query("SELECT id, username, email, role FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- ID: {$row['id']}, Username: {$row['username']}, Email: {$row['email']}, Role: {$row['role']}\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
