<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso - Admin</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        * { box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #F0FFFF 0%, #E0F7FA 100%);
            min-height: 100vh;
            font-family: 'Lato', sans-serif;
        }

        /* ---- Top admin bar ---- */
        .admin-bar {
            background: linear-gradient(135deg, #1a1a2e, #16213e);
            padding: 1rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.8rem;
        }

        .admin-bar-title {
            color: #fff;
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
        }

        .admin-bar-title span {
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .admin-bar-links {
            display: flex;
            gap: 0.6rem;
            flex-wrap: wrap;
        }

        .bar-btn {
            padding: 0.45rem 1rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.2s ease;
        }

        .bar-btn.pink { background: var(--gradient); color: #fff; }
        .bar-btn.blue { background: #2196F3; color: #fff; }
        .bar-btn.gray { background: rgba(255,255,255,0.15); color: #fff; border: 1px solid rgba(255,255,255,0.2); }
        .bar-btn:hover { opacity: 0.85; transform: translateY(-1px); }

        /* ---- Main container ---- */
        .admin-container {
            max-width: 860px;
            margin: 2.5rem auto;
            padding: 0 1.5rem 3rem;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .page-header-icon {
            width: 52px;
            height: 52px;
            background: var(--gradient);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .admin-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: #1a1a2e;
            margin: 0;
        }

        .admin-subtitle {
            color: #888;
            font-size: 0.9rem;
            margin-top: 0.2rem;
        }

        /* ---- Alert messages ---- */
        .alert {
            padding: 1rem 1.4rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: flex-start;
            gap: 0.8rem;
            font-size: 0.95rem;
        }

        .alert-success {
            background: #e8f8f0;
            border: 1px solid #a3d9b8;
            color: #2d7a50;
        }

        .alert-error {
            background: #fff0f0;
            border: 1px solid #f5b8b8;
            color: #c0392b;
        }

        .alert-icon { font-size: 1.2rem; flex-shrink: 0; margin-top: 1px; }

        /* ---- Form card ---- */
        .form-card {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 8px 40px rgba(0,0,0,0.07);
            overflow: hidden;
        }

        .form-card-header {
            background: linear-gradient(135deg, rgba(255,105,180,0.08), rgba(153,50,204,0.06));
            border-bottom: 1px solid rgba(255,105,180,0.15);
            padding: 1.2rem 2rem;
            font-weight: 700;
            color: var(--primary-color);
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .form-body {
            padding: 2rem;
        }

        /* ---- Layout grid ---- */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .form-grid .span-full { grid-column: 1 / -1; }

        /* ---- Form groups ---- */
        .form-group { margin-bottom: 0; }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 700;
            color: #333;
            font-size: 0.88rem;
            letter-spacing: 0.3px;
        }

        .form-group label .req { color: #e53e3e; margin-left: 2px; }

        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group textarea {
            width: 100%;
            padding: 0.8rem 1rem;
            border: 2px solid #eee;
            border-radius: 10px;
            font-family: 'Lato', sans-serif;
            font-size: 0.98rem;
            color: #333;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
            background: #fafafa;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(255,105,180,0.12);
            background: #fff;
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-group small {
            display: block;
            color: #999;
            font-size: 0.8rem;
            margin-top: 0.4rem;
        }

        /* ---- Image preview ---- */
        .image-preview-wrap {
            margin-top: 0.8rem;
            border-radius: 10px;
            overflow: hidden;
            border: 2px dashed #ddd;
            background: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 120px;
        }

        .image-preview-wrap img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            display: block;
        }

        .image-preview-placeholder {
            color: #bbb;
            font-size: 0.85rem;
            text-align: center;
            padding: 1.5rem;
        }

        /* ---- Toggle checkbox ---- */
        .toggle-group {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.2rem;
            background: #f8f8f8;
            border-radius: 10px;
            border: 2px solid #eee;
        }

        .toggle-switch {
            position: relative;
            width: 48px;
            height: 26px;
            flex-shrink: 0;
        }

        .toggle-switch input { opacity: 0; width: 0; height: 0; }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: #ccc;
            border-radius: 26px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .toggle-slider::before {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            left: 3px;
            top: 3px;
            background: #fff;
            border-radius: 50%;
            transition: transform 0.3s;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .toggle-switch input:checked + .toggle-slider { background: var(--gradient); }
        .toggle-switch input:checked + .toggle-slider::before { transform: translateX(22px); }

        .toggle-label { font-weight: 600; color: #333; font-size: 0.95rem; }
        .toggle-desc { color: #999; font-size: 0.8rem; margin-top: 0.1rem; }

        /* ---- Actions ---- */
        .form-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
            padding: 1.5rem 2rem;
            background: #fafafa;
            border-top: 1px solid #f0f0f0;
            flex-wrap: wrap;
        }

        .btn-submit {
            background: var(--gradient);
            color: white;
            padding: 0.85rem 2rem;
            border-radius: 50px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
            box-shadow: 0 4px 15px rgba(255,105,180,0.3);
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255,105,180,0.45);
        }

        .btn-cancel {
            background: transparent;
            color: #666;
            padding: 0.85rem 1.8rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            border: 2px solid #ddd;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .btn-cancel:hover { border-color: #999; color: #333; }

        /* ---- Danger zone ---- */
        .danger-zone {
            margin-top: 1.5rem;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            overflow: hidden;
            border: 1px solid #ffd5d5;
        }

        .danger-zone-header {
            background: #fff5f5;
            border-bottom: 1px solid #ffd5d5;
            padding: 1rem 2rem;
            font-weight: 700;
            color: #e53e3e;
            font-size: 0.9rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .danger-zone-body {
            padding: 1.5rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .danger-zone-body p {
            color: #666;
            font-size: 0.88rem;
            margin: 0;
        }

        .btn-delete {
            background: #e53e3e;
            color: white;
            padding: 0.7rem 1.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 0.85rem;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
        }

        .btn-delete:hover {
            background: #c0392b;
            transform: translateY(-1px);
        }

        /* Responsive */
        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-body { padding: 1.5rem; }
            .form-actions { padding: 1.2rem 1.5rem; }
        }
    </style>
</head>
<body>
    <!-- Admin Bar -->
    <div class="admin-bar">
        <div class="admin-bar-title">✨ <span>Magic Beauty</span> — Panel Admin</div>
        <div class="admin-bar-links">
            <a href="<?= asset('admin/cursos') ?>" class="bar-btn pink">📋 Todos los cursos</a>
            <a href="<?= asset('admin/cursos/create') ?>" class="bar-btn blue">+ Nuevo curso</a>
            <a href="<?= asset('admin/users') ?>" class="bar-btn gray">👥 Usuarios</a>
            <a href="<?= asset('') ?>" class="bar-btn gray">🏠 Sitio</a>
            <a href="<?= route('logout') ?>" class="bar-btn gray">Salir</a>
        </div>
    </div>

    <div class="admin-container">

        <!-- Page Header -->
        <div class="page-header">
            <div class="page-header-icon">✏️</div>
            <div>
                <h1 class="admin-title">Editar Curso</h1>
                <p class="admin-subtitle">Modifica los datos del curso y guarda los cambios.</p>
            </div>
        </div>

        <?php
        require_once __DIR__ . '/../../../../app/Session.php';

        if (Session::hasFlash('success')) {
            echo '<div class="alert alert-success"><span class="alert-icon">✅</span><div><strong>¡Guardado!</strong> ' . htmlspecialchars(Session::getFlash('success')) . '</div></div>';
        }
        if (Session::hasFlash('error')) {
            echo '<div class="alert alert-error"><span class="alert-icon">⚠️</span><div><strong>Error:</strong> ' . htmlspecialchars(Session::getFlash('error')) . '</div></div>';
        }
        if (Session::hasFlash('errors')) {
            $errs = Session::getFlash('errors');
            $list = implode('</li><li>', array_map('htmlspecialchars', $errs));
            echo '<div class="alert alert-error"><span class="alert-icon">⚠️</span><div><strong>Corrige los siguientes errores:</strong><ul style="margin:.4rem 0 0 1.2rem;"><li>' . $list . '</li></ul></div></div>';
        }
        ?>

        <!-- Form Card -->
        <div class="form-card">
            <div class="form-card-header">📝 Información del curso</div>
            <form action="<?= asset('admin/cursos/' . $course->id . '/update') ?>" method="POST">
                <div class="form-body">
                    <div class="form-grid">

                        <!-- Title -->
                        <div class="form-group span-full">
                            <label for="title">Título del Curso <span class="req">*</span></label>
                            <input type="text" id="title" name="title" value="<?= htmlspecialchars($course->title) ?>" required placeholder="Ej: Curso de Extensiones Clásicas">
                        </div>

                        <!-- Description -->
                        <div class="form-group span-full">
                            <label for="description">Descripción <span class="req">*</span></label>
                            <textarea id="description" name="description" required placeholder="Describe brevemente el contenido y beneficios del curso..."><?= htmlspecialchars($course->description) ?></textarea>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Precio ($) <span class="req">*</span></label>
                            <input type="number" id="price" name="price" step="0.01" min="0" value="<?= $course->price ?>" required placeholder="0.00">
                        </div>

                        <!-- Status -->
                        <div class="form-group" style="display:flex;align-items:flex-end;">
                            <div style="width:100%;">
                                <label>Estado del Curso</label>
                                <div class="toggle-group">
                                    <label class="toggle-switch">
                                        <input type="checkbox" id="is_active" name="is_active" <?= $course->is_active ? 'checked' : '' ?>>
                                        <span class="toggle-slider"></span>
                                    </label>
                                    <div>
                                        <div class="toggle-label" id="toggle-label-text"><?= $course->is_active ? '✅ Activo (visible en el sitio)' : '🔴 Inactivo (oculto)' ?></div>
                                        <div class="toggle-desc">Los cursos inactivos no se muestran al público</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Image URL -->
                        <div class="form-group span-full">
                            <label for="image">URL de la Imagen</label>
                            <input 
                                type="text" 
                                id="image" 
                                name="image" 
                                value="<?= htmlspecialchars($course->image) ?>" 
                                placeholder="https://images.unsplash.com/..."
                                oninput="updatePreview(this.value)"
                            >
                            <small>💡 Puedes usar URLs de <strong>Unsplash</strong> o cualquier imagen pública en línea.</small>
                            <div class="image-preview-wrap" id="img-preview-wrap">
                                <?php if ($course->image): ?>
                                    <img src="<?= htmlspecialchars($course->image) ?>" id="img-preview" alt="Vista previa" 
                                         onerror="this.parentElement.innerHTML='<div class=\'image-preview-placeholder\'>❌ No se pudo cargar la imagen</div>'">
                                <?php else: ?>
                                    <div class="image-preview-placeholder">🖼️ Ingresa una URL para ver la vista previa</div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div><!-- /form-grid -->
                </div><!-- /form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn-submit">💾 Guardar Cambios</button>
                    <a href="<?= asset('admin/cursos') ?>" class="btn-cancel">Cancelar</a>
                </div>
            </form>
        </div>

        <!-- Danger Zone: Delete -->
        <div class="danger-zone">
            <div class="danger-zone-header">🗑️ Zona de peligro</div>
            <div class="danger-zone-body">
                <p>Eliminar este curso es una acción permanente y no se puede deshacer.</p>
                <a href="<?= asset('admin/cursos/' . $course->id . '/delete') ?>" class="btn-delete"
                   onclick="return confirm('¿Estás segura de eliminar el curso \'<?= htmlspecialchars(addslashes($course->title)) ?>\'? Esta acción no se puede deshacer.')">
                    🗑️ Eliminar curso
                </a>
            </div>
        </div>

    </div><!-- /admin-container -->

    <script>
        // Live image preview
        function updatePreview(url) {
            const wrap = document.getElementById('img-preview-wrap');
            if (!url.trim()) {
                wrap.innerHTML = '<div class="image-preview-placeholder">🖼️ Ingresa una URL para ver la vista previa</div>';
                return;
            }
            const img = new Image();
            img.onload = function () {
                wrap.innerHTML = '<img src="' + url + '" id="img-preview" alt="Vista previa" style="width:100%;max-height:200px;object-fit:cover;display:block;">';
            };
            img.onerror = function () {
                wrap.innerHTML = '<div class="image-preview-placeholder">❌ URL de imagen no válida o no cargó</div>';
            };
            img.src = url;
        }

        // Toggle label text
        const toggle = document.getElementById('is_active');
        const label  = document.getElementById('toggle-label-text');
        toggle.addEventListener('change', function () {
            label.textContent = this.checked ? '✅ Activo (visible en el sitio)' : '🔴 Inactivo (oculto)';
        });
    </script>
</body>
</html>
