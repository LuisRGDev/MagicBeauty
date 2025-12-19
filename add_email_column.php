<?php
require_once 'app/Database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    try {
        // Check if email column exists
        $result = $db->query("PRAGMA table_info(users)");
        $columns = $result->fetchAll(PDO::FETCH_ASSOC);
        $hasEmail = false;
        
        foreach ($columns as $column) {
            if ($column['name'] === 'email') {
                $hasEmail = true;
                break;
            }
        }
        
        if (!$hasEmail) {
            // Backup existing data
            $users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
            
            // Drop old table
            $db->exec("DROP TABLE users");
            
            // Create new table with email field
            $db->exec("CREATE TABLE users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username TEXT UNIQUE NOT NULL,
                email TEXT UNIQUE NOT NULL,
                password TEXT NOT NULL,
                role TEXT DEFAULT 'user',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            )");
            
            // Restore data with placeholder emails
            $stmt = $db->prepare("INSERT INTO users (id, username, email, password, role, created_at) VALUES (?, ?, ?, ?, ?, ?)");
            foreach ($users as $user) {
                $email = $user['username'] . '@magicbeauty.local';
                $stmt->execute([
                    $user['id'],
                    $user['username'],
                    $email,
                    $user['password'],
                    $user['role'],
                    $user['created_at']
                ]);
            }
            
            echo "Table recreated with email column successfully.\n";
            echo "Existing users updated with placeholder emails.\n";
        } else {
            echo "Email column already exists.\n";
        }
        
        // Display current users
        echo "\nCurrent users:\n";
        $stmt = $db->query("SELECT id, username, email, role FROM users");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "- ID: {$row['id']}, Username: {$row['username']}, Email: {$row['email']}, Role: {$row['role']}\n";
        }
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }
} else {
    echo "Could not connect to database.\n";
}
