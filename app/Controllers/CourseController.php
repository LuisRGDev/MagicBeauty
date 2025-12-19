<?php
require_once __DIR__ . '/../Models/Course.php';
require_once __DIR__ . '/../Auth.php';

class CourseController {
    private $course;
    private $auth;

    public function __construct() {
        $this->course = new Course();
        $this->auth = new Auth();
    }

    // Public: List active courses
    public function index() {
        $courses = $this->course->getAll(true);
        return view('courses.index', ['courses' => $courses]);
    }

    // Admin: List all courses
    public function adminIndex() {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        $courses = $this->course->getAll(false);
        return view('admin.courses.index', ['courses' => $courses]);
    }

    // Admin: Show create form
    public function create() {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        return view('admin.courses.create');
    }

    // Admin: Store new course
    public function store() {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        
        // Validation
        $errors = [];
        
        $title = trim($_POST['title'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $price = $_POST['price'] ?? '';
        $image = trim($_POST['image'] ?? '');
        $is_active = isset($_POST['is_active']) ? 1 : 0;
        
        // Validate required fields
        if (empty($title)) {
            $errors[] = 'El título es requerido';
        }
        
        if (empty($description)) {
            $errors[] = 'La descripción es requerida';
        }
        
        if (empty($price) || !is_numeric($price) || $price < 0) {
            $errors[] = 'El precio debe ser un número válido mayor o igual a 0';
        }
        
        // Validate image URL if provided
        if (!empty($image) && !filter_var($image, FILTER_VALIDATE_URL)) {
            $errors[] = 'La URL de la imagen no es válida';
        }
        
        // If there are validation errors, redirect back with errors
        if (!empty($errors)) {
            require_once __DIR__ . '/../Session.php';
            Session::flash('errors', $errors);
            Session::flash('old', $_POST);
            header('Location: /admin/cursos/create');
            exit;
        }
        
        // Prepare data
        $data = [
            'title' => $title,
            'description' => $description,
            'price' => floatval($price),
            'image' => $image,
            'is_active' => $is_active
        ];
        
        // Try to create the course
        try {
            if ($this->course->create($data)) {
                require_once __DIR__ . '/../Session.php';
                Session::flash('success', 'Curso creado exitosamente');
                header('Location: /admin/cursos');
                exit;
            } else {
                require_once __DIR__ . '/../Session.php';
                Session::flash('error', 'Error al crear el curso. Por favor, intenta de nuevo.');
                header('Location: /admin/cursos/create');
                exit;
            }
        } catch (Exception $e) {
            require_once __DIR__ . '/../Session.php';
            Session::flash('error', 'Error al crear el curso: ' . $e->getMessage());
            header('Location: /admin/cursos/create');
            exit;
        }
    }

    // Admin: Show edit form
    public function edit($id) {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        $course = $this->course->find($id);
        return view('admin.courses.edit', ['course' => $course]);
    }

    // Admin: Update course
    public function update($id) {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $_POST['image'],
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        if ($this->course->update($id, $data)) {
            header('Location: /admin/cursos');
            exit;
        } else {
            return "Error updating course.";
        }
    }

    // Admin: Delete course
    public function destroy($id) {
        if (!$this->auth->isAdmin()) {
            header('Location: /login');
            exit;
        }
        if ($this->course->delete($id)) {
            header('Location: /admin/cursos');
            exit;
        } else {
            return "Error deleting course.";
        }
    }
}
