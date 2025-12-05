<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Curso</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        .admin-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
        }

        .admin-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-family: 'Lato', sans-serif;
            font-size: 1rem;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-submit {
            background: var(--gradient);
            color: white;
            padding: 1rem 2rem;
            border-radius: 5px;
            border: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 1rem;
        }

        .btn-submit:hover {
            opacity: 0.9;
        }

        .btn-cancel {
            background: #666;
            color: white;
            padding: 1rem 2rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
        }

        .btn-cancel:hover {
            background: #555;
        }
    </style>
</head>
<body style="background: linear-gradient(to bottom, #F0FFFF, #E0F7FA);">
    <div class="admin-container">
        <h1 class="admin-title">Crear Nuevo Curso</h1>

        <form action="/admin/cursos/store" method="POST">
            <div class="form-group">
                <label for="title">Título del Curso *</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Descripción *</label>
                <textarea id="description" name="description" required></textarea>
            </div>

            <div class="form-group">
                <label for="price">Precio ($) *</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required>
            </div>

            <div class="form-group">
                <label for="image">URL de la Imagen</label>
                <input type="text" id="image" name="image" placeholder="https://ejemplo.com/imagen.jpg">
                <small style="color: #666; display: block; margin-top: 0.3rem;">
                    Puedes usar una URL de Unsplash o cualquier imagen pública
                </small>
            </div>

            <div class="form-group">
                <div class="checkbox-group">
                    <input type="checkbox" id="is_active" name="is_active" checked>
                    <label for="is_active" style="margin: 0;">Curso Activo</label>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">Guardar Curso</button>
                <a href="/admin/cursos" class="btn-cancel">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>
