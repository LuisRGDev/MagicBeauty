<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Cursos</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .admin-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary-color);
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }

        .courses-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .courses-table th,
        .courses-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .courses-table th {
            background: var(--gradient);
            color: white;
            font-weight: bold;
        }

        .courses-table tr:hover {
            background: rgba(255, 105, 180, 0.1);
        }

        .course-img-thumb {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 5px;
        }

        .status-badge {
            padding: 0.3rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: bold;
        }

        .status-active {
            background: #4CAF50;
            color: white;
        }

        .status-inactive {
            background: #f44336;
            color: white;
        }

        .action-btns {
            display: flex;
            gap: 0.5rem;
        }

        .btn-edit {
            background: #2196F3;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-delete {
            background: #f44336;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-edit:hover,
        .btn-delete:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom, #F0FFFF, #E0F7FA);">
    <div class="admin-container">
        <div class="admin-header">
            <h1 class="admin-title">Administrar Cursos</h1>
            <div style="display: flex; gap: 1rem;">
                <a href="/admin/cursos/create" class="btn-primary">+ Nuevo Curso</a>
                <a href="/logout" class="btn-primary" style="background: #666;">Cerrar Sesión</a>
            </div>
        </div>

        <table class="courses-table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($courses as $course): ?>
                <tr>
                    <td>
                        <img src="<?= htmlspecialchars($course->image) ?>" 
                             alt="<?= htmlspecialchars($course->title) ?>" 
                             class="course-img-thumb"
                             onerror="this.src='https://via.placeholder.com/80x60?text=Curso'">
                    </td>
                    <td><?= htmlspecialchars($course->title) ?></td>
                    <td>$<?= number_format($course->price, 2) ?></td>
                    <td>
                        <span class="status-badge <?= $course->is_active ? 'status-active' : 'status-inactive' ?>">
                            <?= $course->is_active ? 'Activo' : 'Inactivo' ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-btns">
                            <a href="/admin/cursos/<?= $course->id ?>/edit" class="btn-edit">Editar</a>
                            <a href="/admin/cursos/<?= $course->id ?>/delete" 
                               class="btn-delete" 
                               onclick="return confirm('¿Estás seguro de eliminar este curso?')">Eliminar</a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div style="margin-top: 2rem; text-align: center;">
            <a href="/" style="color: var(--primary-color); text-decoration: none;">← Volver al sitio</a>
        </div>
    </div>
</body>
</html>
