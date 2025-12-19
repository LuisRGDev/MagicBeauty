<?php
require_once 'app/Database.php';

$database = new Database();
$conn = $database->getConnection();

try {
    // Check current state
    echo "Before fix:\n";
    $stmt = $conn->query("SELECT id, username, role FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- ID: {$row['id']}, Username: {$row['username']}, Role: {$row['role']}\n";
    }
    
    // Fix admin role using ID
    $stmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
    $stmt->execute(['admin', 1]);
    echo "\nUpdated user ID 1 to admin role\n";
    
    // Check after fix
    echo "\nAfter fix:\n";
    $stmt = $conn->query("SELECT id, username, email, role FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "- ID: {$row['id']}, Username: {$row['username']}, Email: {$row['email']}, Role: {$row['role']}\n";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
