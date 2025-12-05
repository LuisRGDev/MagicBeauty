<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos - Magic Beauty</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        /* Specific styles for courses page */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .course-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .course-card:hover {
            transform: translateY(-5px);
        }

        .course-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .course-content {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .course-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .course-desc {
            color: #555;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 1rem;
            flex-grow: 1;
        }

        .course-price {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 1rem;
        }

        .course-btn {
            display: block;
            text-align: center;
            background: var(--gradient);
            color: white;
            padding: 0.8rem;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: opacity 0.3s;
        }

        .course-btn:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <header>
        <nav class="nav-left">
            <ul>
                <li><a href="<?= route('home') ?>#inicio">Inicio</a></li>
                <li><a href="<?= route('home') ?>#nosotros">Nosotros</a></li>
            </ul>
        </nav>
        <a href="<?= route('home') ?>" class="logo">
            <img src="<?= asset('img/logo.png') ?>" alt="logo" class="logo-img">
            Beauty Studio
        </a>
        <nav class="nav-right">
            <ul>
                <li><a href="<?= route('home') ?>#servicios">Servicios</a></li>
                <li><a href="<?= route('home') ?>/cursos" class="active">Cursos</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <button class="menu-toggle">☰</button>
    </header>

    <section class="hero" style="min-height: 60vh; background: linear-gradient(rgba(255, 105, 180, 0.4), rgba(153, 50, 204, 0.4)), url('https://images.unsplash.com/photo-1522337660859-02fbefca4702?q=80&w=1000&auto=format&fit=crop');">
        <div class="hero-text animate-fade-in">
            <h1>Nuestros Cursos</h1>
            <p class="subtitle">Aprende y Emprende</p>
        </div>
    </section>

    <section class="services" style="background: linear-gradient(to bottom, #F0FFFF, #E0F7FA);">
        <div class="courses-grid">
            <?php foreach ($courses as $course): ?>
            <div class="course-card">
                <img src="<?= htmlspecialchars($course->image) ?>" alt="<?= htmlspecialchars($course->title) ?>" class="course-img" onerror="this.src='https://via.placeholder.com/300x200?text=Curso'">
                <div class="course-content">
                    <h3 class="course-title"><?= htmlspecialchars($course->title) ?></h3>
                    <p class="course-desc"><?= htmlspecialchars($course->description) ?></p>
                    <div class="course-price">$<?= number_format($course->price, 2) ?></div>
                    <a href="https://wa.me/15123649251?text=Hola, me interesa el curso: <?= urlencode($course->title) ?>" class="course-btn" target="_blank">Más Información</a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer class="site-footer">
        <div class="footer-content">
            <div class="footer-column">
                <h3>Magik Beauty</h3>
                <p>Formando profesionales en la industria de la belleza.</p>
            </div>
            <div class="footer-column">
                <h3>Enlaces Rápidos</h3>
                <ul>
                    <li><a href="<?= route('home') ?>">Inicio</a></li>
                    <li><a href="<?= route('pestanas') ?>">Pestañas</a></li>
                    <li><a href="<?= route('faciales') ?>">Faciales</a></li>
                    <li><a href="<?= route('micorp') ?>">Micropigmentación</a></li>
                    <li><a href="<?= route('home') ?>/cursos">Cursos</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contacto</h3>
                <p>📍 3710 Airport Blvd Austin TX 78722</p>
                <p>📞 +1 (512) 364-9251</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Magik Beauty. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
