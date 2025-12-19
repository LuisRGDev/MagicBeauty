<?php

require_once __DIR__ . '/../app/Controllers/CourseController.php';
require_once __DIR__ . '/../app/Controllers/AuthController.php';

$courseController = new CourseController();
$authController = new AuthController();

$router->get('/', function () {
    return view('index');
})->name('home');

$router->get('/pestanas', function () {
    return view('pestanas');
})->name('pestanas');

$router->get('/faciales', function () {
    return view('faciales');
})->name('faciales');

$router->get('/micorp', function () {
    return view('micorp');
})->name('micorp');

// Auth Routes
$router->get('/login', function () use ($authController) {
    return $authController->showLogin();
});

$router->post('/login', function () use ($authController) {
    return $authController->login();
});

$router->get('/logout', function () use ($authController) {
    return $authController->logout();
});

$router->get('/register', function () use ($authController) {
    return $authController->showRegister();
});

$router->post('/register', function () use ($authController) {
    return $authController->register();
});

// Public Courses Route
$router->get('/cursos', function () use ($courseController) {
    return $courseController->index();
});

// Admin Routes (Protected)
$router->get('/admin/cursos', function () use ($courseController) {
    return $courseController->adminIndex();
});

$router->get('/admin/cursos/create', function () use ($courseController) {
    return $courseController->create();
});

$router->post('/admin/cursos/store', function () use ($courseController) {
    return $courseController->store();
});

$router->get('/admin/cursos/{id}/edit', function ($id) use ($courseController) {
    return $courseController->edit($id);
});

$router->post('/admin/cursos/{id}/update', function ($id) use ($courseController) {
    return $courseController->update($id);
});


$router->get('/admin/cursos/{id}/delete', function ($id) use ($courseController) {
    return $courseController->destroy($id);
});

// Admin User Management Routes
require_once __DIR__ . '/../app/Controllers/UserController.php';
$userController = new UserController();

$router->get('/admin/users', function () use ($userController) {
    return $userController->index();
});

$router->get('/admin/users/create', function () use ($userController) {
    return $userController->create();
});

$router->post('/admin/users/store', function () use ($userController) {
    return $userController->store();
});

$router->get('/admin/users/{id}/delete', function ($id) use ($userController) {
    return $userController->delete($id);
});

