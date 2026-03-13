<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos Profesionales - Magic Beauty</title>
    <meta name="description" content="Cursos profesionales de belleza en Magic Beauty. Aprende extensiones de pestañas, volumen ruso, lifting, micropigmentación y más. Formación de excelencia.">
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">
    <style>
        /* ===== COURSES PAGE - PREMIUM DESIGN ===== */

        /* --- Hero Section --- */
        .courses-hero {
            min-height: 65vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 105, 180, 0.55) 0%, rgba(153, 50, 204, 0.65) 100%),
                url('https://images.unsplash.com/photo-1522337660859-02fbefca4702?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        }

        .courses-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(ellipse at center bottom, rgba(255, 20, 147, 0.3) 0%, transparent 70%);
        }

        .courses-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding: 2rem;
            animation: fadeIn 1s ease-out;
        }

        .courses-hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.8rem, 7vw, 5.5rem);
            color: #fff;
            text-shadow: 0 4px 30px rgba(0,0,0,0.4);
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .courses-hero h1 span {
            background: linear-gradient(135deg, #ffd1ec, #e8a0ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .courses-hero .subtitle {
            font-size: clamp(1rem, 2.5vw, 1.3rem);
            color: rgba(255,255,255,0.9);
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 2rem;
        }

        .hero-badges {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .hero-badge {
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.3);
            color: #fff;
            padding: 0.5rem 1.2rem;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* --- Section Wrapper --- */
        .courses-section {
            background: linear-gradient(180deg, #F0FFFF 0%, #E8F4F8 100%);
            padding: 5rem 2rem;
        }

        .courses-section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .courses-section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 1rem;
        }

        .courses-section-header p {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 550px;
            margin: 0 auto;
            line-height: 1.8;
        }

        .section-divider {
            width: 60px;
            height: 3px;
            background: var(--gradient);
            margin: 1.2rem auto;
            border-radius: 3px;
        }

        /* --- Courses Grid --- */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* --- Course Card --- */
        .course-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            transition: transform 0.35s ease, box-shadow 0.35s ease;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--gradient);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .course-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 50px rgba(255, 105, 180, 0.18);
        }

        .course-card:hover::before {
            opacity: 1;
        }

        /* Image wrapper */
        .course-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 220px;
        }

        .course-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .course-card:hover .course-img {
            transform: scale(1.07);
        }

        .course-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(153, 50, 204, 0.35), transparent);
        }

        .course-category-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--gradient);
            color: #fff;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.35rem 0.9rem;
            border-radius: 50px;
            box-shadow: 0 4px 12px rgba(255, 105, 180, 0.4);
        }

        /* Card Content */
        .course-content {
            padding: 1.8rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .course-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.35rem;
            color: #1a1a2e;
            margin-bottom: 0.7rem;
            line-height: 1.35;
        }

        .course-desc {
            color: #666;
            font-size: 0.92rem;
            line-height: 1.7;
            flex-grow: 1;
            margin-bottom: 1.4rem;
        }

        /* Card Footer */
        .course-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 1.2rem;
            border-top: 1px solid #f0f0f0;
        }

        .course-price {
            display: flex;
            flex-direction: column;
        }

        .course-price-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #999;
        }

        .course-price-amount {
            font-size: 1.6rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            line-height: 1.1;
        }

        .course-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--gradient);
            color: #fff;
            padding: 0.7rem 1.3rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 105, 180, 0.3);
            white-space: nowrap;
        }

        .course-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.5);
        }

        .course-btn svg {
            width: 16px;
            height: 16px;
            fill: #fff;
            flex-shrink: 0;
        }

        /* --- Empty state --- */
        .courses-empty {
            text-align: center;
            padding: 5rem 2rem;
            color: var(--text-muted);
            grid-column: 1 / -1;
        }

        .courses-empty p {
            font-size: 1.2rem;
            margin-top: 1rem;
        }

        /* --- Why Choose Us --- */
        .why-us {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            padding: 5rem 2rem;
            text-align: center;
        }

        .why-us h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            color: #fff;
            margin-bottom: 0.8rem;
        }

        .why-us h2 span {
            background: var(--gradient);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .why-us > p {
            color: rgba(255,255,255,0.65);
            font-size: 1rem;
            max-width: 500px;
            margin: 0 auto 3.5rem;
        }

        .why-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 2rem;
            max-width: 1100px;
            margin: 0 auto;
        }

        .why-card {
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 16px;
            padding: 2.5rem 1.5rem;
            transition: all 0.35s ease;
        }

        .why-card:hover {
            background: rgba(255, 105, 180, 0.1);
            border-color: rgba(255, 105, 180, 0.4);
            transform: translateY(-6px);
        }

        .why-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            display: block;
        }

        .why-card h3 {
            font-family: 'Playfair Display', serif;
            color: #fff;
            font-size: 1.15rem;
            margin-bottom: 0.6rem;
        }

        .why-card p {
            color: rgba(255,255,255,0.6);
            font-size: 0.88rem;
            line-height: 1.7;
        }

        /* --- CTA Banner --- */
        .courses-cta {
            background: var(--gradient);
            padding: 4rem 2rem;
            text-align: center;
        }

        .courses-cta h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            color: #fff;
            margin-bottom: 0.8rem;
        }

        .courses-cta p {
            color: rgba(255,255,255,0.85);
            font-size: 1.05rem;
            margin-bottom: 2rem;
        }

        .courses-cta a {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            background: #fff;
            color: var(--primary-color);
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: 800;
            font-size: 1rem;
            text-decoration: none;
            box-shadow: 0 8px 30px rgba(0,0,0,0.2);
            transition: all 0.3s ease;
        }

        .courses-cta a:hover {
            transform: translateY(-3px) scale(1.03);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }

        /* --- Responsive --- */
        @media (max-width: 768px) {
            .courses-grid {
                grid-template-columns: 1fr;
                gap: 1.8rem;
            }

            .why-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 480px) {
            .why-grid {
                grid-template-columns: 1fr;
            }

            .course-footer {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .course-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <nav class="nav-left">
            <ul>
                <li><a href="<?= route('home') ?>#inicio">Inicio</a></li>
                <li><a href="<?= route('home') ?>#nosotros">Nosotros</a></li>
            </ul>
        </nav>
        <a href="<?= route('home') ?>" class="logo">
            <img src="<?= asset('img/logo.png') ?>" alt="Magic Beauty Logo" class="logo-img">
            Beauty Studio
        </a>
        <nav class="nav-right">
            <ul>
                <li><a href="<?= route('home') ?>#servicios">Servicios</a></li>
                <li><a href="/cursos" class="active">Cursos</a></li>
                <li><a href="<?= route('home') ?>#contacto">Contacto</a></li>
            </ul>
        </nav>
        <button class="menu-toggle" aria-label="Abrir menú">☰</button>
    </header>

    <!-- HERO -->
    <section class="courses-hero">
        <div class="courses-hero-content">
            <p class="subtitle">✦ Formación Profesional ✦</p>
            <h1>Nuestros <span>Cursos</span></h1>
            <div class="hero-badges">
                <!-- <span class="hero-badge">🎓 Certificación incluida</span> -->
                <span class="hero-badge">💼 Kit de práctica</span>
                <span class="hero-badge">⭐ Instructoras expertas</span>
            </div>
        </div>
    </section>

    <!-- COURSES GRID -->
    <section class="courses-section">
        <div class="courses-section-header">
            <h2>Elige tu Especialidad</h2>
            <div class="section-divider"></div>
            <p>Cursos diseñados para llevarte de principiante a profesional con técnicas del más alto nivel.</p>
        </div>

        <div class="courses-grid">
            <?php if (!empty($courses)): ?>
                <?php foreach ($courses as $index => $course): ?>
                <div class="course-card" style="animation: slideUp 0.6s ease-out <?= $index * 0.12 ?>s both;">
                    <div class="course-img-wrapper">
                        <img 
                            src="<?= htmlspecialchars($course->image) ?>" 
                            alt="<?= htmlspecialchars($course->title) ?>" 
                            class="course-img"
                            loading="lazy"
                            onerror="this.src='https://images.unsplash.com/photo-1522337660859-02fbefca4702?q=80&w=600&auto=format&fit=crop'"
                        >
                        <div class="course-img-overlay"></div>
                        <span class="course-category-badge">✨ Curso Profesional</span>
                    </div>

                    <div class="course-content">
                        <h3 class="course-title"><?= htmlspecialchars($course->title) ?></h3>
                        <p class="course-desc"><?= htmlspecialchars($course->description) ?></p>

                        <div class="course-footer">
                            <div class="course-price">
                                <span class="course-price-label">Inversión</span>
                                <span class="course-price-amount">$<?= number_format($course->price, 0) ?></span>
                            </div>
                            <a 
                                href="https://wa.me/15123649251?text=Hola%2C%20me%20interesa%20el%20curso%3A%20<?= urlencode($course->title) ?>" 
                                class="course-btn"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                Más Info
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="courses-empty">
                    <span style="font-size:3rem;">🎓</span>
                    <p>Próximamente nuevos cursos disponibles.</p>
                    <p style="font-size:0.95rem; margin-top:0.5rem;">Contáctanos para recibir información de nuestros programas.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- WHY CHOOSE US -->
    <section class="why-us">
        <h2>¿Por qué estudiar con <span>nosotras</span>?</h2>
        <p>Formamos profesionistas exitosas en la industria de la belleza.</p>
        <div class="why-grid">
            <div class="why-card">
                <span class="why-icon">🏆</span>
                <h3>Técnicas Certificadas</h3>
                <p>Aprende las técnicas más demandadas del mercado.</p>
            </div>
            <div class="why-card">
                <span class="why-icon">👩‍🏫</span>
                <h3>Instructoras Expertas</h3>
                <p>Profesora con más de 10 años de experiencia y cientos de referencias positivas.</p>
            </div>
            <div class="why-card">
                <span class="why-icon">🎁</span>
                <h3>Kit de Materiales</h3>
                <p>Cada alumna recibe su propio kit de herramientas profesionales incluido en el curso.</p>
            </div>
            <!-- <div class="why-card">
                <span class="why-icon">💼</span>
                <h3>Bolsa de Trabajo</h3>
                <p>Te conectamos con spas y salones de belleza para impulsar tu carrera profesional.</p>
            </div> -->
        </div>
    </section>

    <!-- CTA BANNER -->
    <section class="courses-cta">
        <h2>¿Lista para comenzar tu capacitacion?</h2>
        <p>Agenda una consulta gratuita y te asesoramos sobre el curso ideal para ti.</p>
        <a href="https://wa.me/15123649251?text=Hola%2C%20quiero%20informaci%C3%B3n%20sobre%20los%20cursos%20de%20Magic%20Beauty" target="_blank" rel="noopener noreferrer">
            <svg style="width:20px;height:20px;fill:currentColor;" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.521.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            Contáctanos por WhatsApp
        </a>
    </section>

    <!-- FOOTER -->
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
                    <li><a href="<?= route('cursos') ?>">Cursos</a></li>
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

    <div class="mobile-menu-overlay"></div>
    <aside class="mobile-nav">
        <button class="menu-close">&times;</button>
        <div class="mobile-nav-content">
            <a href="<?= route('home') ?>" class="mobile-logo">
                <img src="<?= asset('img/logo.png') ?>" alt="logo">
            </a>
            <ul class="mobile-links">
                <li><a href="<?= route('home') ?>#inicio">Inicio</a></li>
                <li><a href="<?= route('home') ?>#nosotros">Nosotros</a></li>
                <li><a href="<?= route('home') ?>#servicios">Servicios</a></li>
                <li><a href="<?= route('cursos') ?>" class="active">Cursos</a></li>
                <li><a href="<?= route('home') ?>#contacto">Contacto</a></li>
            </ul>
            <div class="mobile-social">
                <a href="https://www.instagram.com/magikbeauty__bygisel/" aria-label="Instagram">Instagram</a>
                <a href="https://www.facebook.com/profile.php?id=100064063332814" aria-label="Facebook">Facebook</a>
            </div>
        </div>
    </aside>

    <a href="https://wa.me/15123649251?text=Hola me gustaria agendar una cita!" class="whatsapp-float" target="_blank" aria-label="Chat en WhatsApp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>

    <script src="<?= asset('js/script.js') ?>"></script>
</body>
</html>
