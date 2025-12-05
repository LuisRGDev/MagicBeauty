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
        $data = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'price' => $_POST['price'],
            'image' => $_POST['image'],
            'is_active' => isset($_POST['is_active']) ? 1 : 0
        ];

        if ($this->course->create($data)) {
            header('Location: /admin/cursos');
            exit;
        } else {
            return "Error creating course.";
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
