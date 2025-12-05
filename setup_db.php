<?php
require_once 'app/Database.php';

$database = new Database();
$db = $database->getConnection();

if ($db) {
    // SQLite syntax
    $sql = "CREATE TABLE IF NOT EXISTS courses (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        title TEXT NOT NULL,
        description TEXT,
        price REAL NOT NULL,
        image TEXT,
        is_active INTEGER DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";

    try {
        $db->exec($sql);
        echo "Table 'courses' created successfully.\n";
        
        // Seed some data if empty
        $stmt = $db->query("SELECT COUNT(*) FROM courses");
        if ($stmt->fetchColumn() == 0) {
            $courses = [
                [
                    'title' => 'Curso de Extensiones Clásicas',
                    'description' => 'Aprende la técnica fundamental de aplicación 1 a 1. Ideal para principiantes.',
                    'price' => 250.00,
                    'image' => 'https://images.unsplash.com/photo-1587910234573-d6fc84743bc8?q=80&w=1376&auto=format&fit=crop',
                    'is_active' => 1
                ],
                [
                    'title' => 'Masterclass Volumen Ruso',
                    'description' => 'Técnica avanzada para crear abanicos perfectos y lograr densidad.',
                    'price' => 350.00,
                    'image' => 'https://images.unsplash.com/photo-1631214500115-598fc2cb8d2d?q=80&w=1000&auto=format&fit=crop',
                    'is_active' => 1
                ],
                [
                    'title' => 'Lifting de Pestañas y Laminado',
                    'description' => 'Domina el arte de realzar la pestaña natural y diseñar cejas perfectas.',
                    'price' => 200.00,
                    'image' => 'https://images.unsplash.com/photo-1522337660859-02fbefca4702?q=80&w=1000&auto=format&fit=crop',
                    'is_active' => 1
                ]
            ];

            $insert = "INSERT INTO courses (title, description, price, image, is_active) VALUES (:title, :description, :price, :image, :is_active)";
            $stmt = $db->prepare($insert);

            foreach ($courses as $course) {
                $stmt->execute($course);
            }
            echo "Seeded example courses.\n";
        }

    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage() . "\n";
    }
} else {
    echo "Could not connect to database.\n";
}
