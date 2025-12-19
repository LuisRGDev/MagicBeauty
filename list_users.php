<?php
require_once 'app/Database.php';

$database = new Database();
$conn = $database->getConnection();

echo "Users in database:\n";
$stmt = $conn->query("SELECT username, email, role FROM users");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "- {$row['username']} ({$row['email']}) - Role: {$row['role']}\n";
}
