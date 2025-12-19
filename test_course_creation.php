<?php
require_once 'app/Database.php';
require_once 'app/Models/Course.php';

echo "=== Testing Course Creation ===\n\n";

// Test 1: Check existing courses
echo "1. Existing courses in database:\n";
$course = new Course();
$courses = $course->getAll(false);
echo "Total courses: " . count($courses) . "\n";
foreach ($courses as $c) {
    echo "  - ID: {$c->id}, Title: {$c->title}, Price: \${$c->price}\n";
}

// Test 2: Try to create a new course
echo "\n2. Creating a new test course...\n";
$testData = [
    'title' => 'Curso de Prueba Automatizado',
    'description' => 'Este es un curso de prueba creado automáticamente',
    'price' => 99.99,
    'image' => 'https://images.unsplash.com/photo-1522337660859-02fbefca4702',
    'is_active' => 1
];

try {
    $result = $course->create($testData);
    if ($result) {
        echo "✓ Course created successfully!\n";
        
        // Verify it was created
        $courses = $course->getAll(false);
        echo "Total courses after creation: " . count($courses) . "\n";
        $lastCourse = $courses[0];
        echo "Last course: {$lastCourse->title} - \${$lastCourse->price}\n";
    } else {
        echo "✗ Failed to create course\n";
    }
} catch (Exception $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
}

echo "\n=== Test Complete ===\n";
