<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios - Magic Beauty Admin</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        body {
            background: linear-gradient(to bottom, #F0FFFF, #E0F7FA);
            min-height: 100vh;
            padding: 2rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .admin-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #ddd;
        }

        .admin-header h1 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-color);
            margin: 0;
        }

        .admin-nav {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .admin-nav a {
            padding: 0.5rem 1rem;
            background: #f5f5f5;
            color: #333;
            text-decoration: none;
            border-radius: 8px;
            transition: all 0.3s;
        }

        .admin-nav a:hover, .admin-nav a.active {
            background: var(--gradient);
            color: white;
        }

        .btn {
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: transform 0.3s;
        }

        .btn-primary {
            background: var(--gradient);
            color: white;
        }

        .btn-danger {
            background: linear-gradient(135deg, #f44336, #d32f2f);
            color: white;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .users-table th,
        .users-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .users-table th {
            background: #f5f5f5;
            font-weight: bold;
            color: #333;
        }

        .users-table tr:hover {
            background: #f9f9f9;
        }

        .badge {
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: bold;
        }

        .badge-admin {
            background: #4caf50;
            color: white;
        }

        .badge-user {
            background: #2196f3;
            color: white;
        }

        .error-message {
            background: #ffebee;
            color: #c62828;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .btn-small {
            padding: 0.4rem 0.8rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h1>Gestión de Usuarios</h1>
            <a href="/" class="btn btn-primary">← Volver al Inicio</a>
        </div>

        <div class="admin-nav">
            <a href="/admin/cursos">Cursos</a>
            <a href="/admin/users" class="active">Usuarios</a>
            <a href="/logout" style="margin-left: auto;">Cerrar Sesión</a>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <div style="margin-bottom: 1.5rem;">
            <a href="/admin/users/create" class="btn btn-primary">+ Crear Nuevo Usuario/Admin</a>
        </div>

        <table class="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Fecha de Creación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($users)): ?>
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 2rem;">
                            No hay usuarios registrados
                        </td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user->id) ?></td>
                            <td><?= htmlspecialchars($user->username) ?></td>
                            <td><?= htmlspecialchars($user->email) ?></td>
                            <td>
                                <span class="badge badge-<?= $user->role ?>">
                                    <?= $user->role === 'admin' ? 'Administrador' : 'Usuario' ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($user->created_at)) ?></td>
                            <td>
                                <div class="actions">
                                    <a href="/admin/users/<?= $user->id ?>/delete" 
                                       class="btn btn-danger btn-small"
                                       onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                        Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
