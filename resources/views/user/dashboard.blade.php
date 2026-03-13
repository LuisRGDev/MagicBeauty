<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Mi Cuenta — Magik Beauty Gisel</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a0a14 0%, #2d0a2d 50%, #0d0d1a 100%);
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            width: 600px; height: 600px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,105,180,0.25), transparent 70%);
            top: -200px; right: -200px;
            pointer-events: none;
        }

        /* ── Header ── */
        .dash-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.2rem 2.5rem;
            background: rgba(255,255,255,0.03);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .dash-logo {
            display: flex;
            align-items: center;
            gap: 0.7rem;
            text-decoration: none;
        }
        .dash-logo img {
            width: 40px; height: 40px;
            border-radius: 50%;
            border: 2px solid rgba(255,105,180,0.4);
        }
        .dash-logo span {
            font-family: 'Playfair Display', serif;
            color: #fff;
            font-size: 1.1rem;
        }
        .dash-logout {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.7);
            padding: 0.5rem 1.1rem;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            transition: all 0.2s;
        }
        .dash-logout:hover {
            background: rgba(255,80,80,0.15);
            border-color: rgba(255,80,80,0.3);
            color: #ff8888;
        }

        /* ── Main ── */
        .dash-main {
            max-width: 900px;
            margin: 0 auto;
            padding: 3.5rem 2rem;
        }

        /* Welcome hero */
        .dash-welcome {
            text-align: center;
            margin-bottom: 3.5rem;
            animation: fadeSlideUp 0.6s ease-out forwards;
        }
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .welcome-avatar {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff69b4, #9932cc);
            display: flex; align-items: center; justify-content: center;
            font-size: 2rem;
            margin: 0 auto 1.5rem;
            box-shadow: 0 12px 40px rgba(255,105,180,0.4);
        }
        .dash-welcome h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            color: #fff;
            margin-bottom: 0.5rem;
        }
        .dash-welcome p {
            color: rgba(255,255,255,0.5);
            font-size: 1rem;
        }

        /* Cards grid */
        .dash-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
        }

        .dash-card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 18px;
            padding: 2rem 1.8rem;
            text-decoration: none;
            transition: all 0.3s ease;
            animation: fadeSlideUp 0.6s ease-out both;
            position: relative;
            overflow: hidden;
        }
        .dash-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,105,180,0.08), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .dash-card:hover {
            border-color: rgba(255,105,180,0.3);
            transform: translateY(-6px);
            box-shadow: 0 20px 50px rgba(255,105,180,0.15);
        }
        .dash-card:hover::before { opacity: 1; }

        .card-icon {
            font-size: 2.2rem;
            margin-bottom: 1rem;
            display: block;
        }
        .dash-card h3 {
            font-family: 'Playfair Display', serif;
            color: #fff;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
        }
        .dash-card p {
            color: rgba(255,255,255,0.45);
            font-size: 0.88rem;
            line-height: 1.6;
        }
        .card-arrow {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            margin-top: 1.2rem;
            color: #ff69b4;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Stagger animation delays */
        .dash-card:nth-child(1) { animation-delay: 0.1s; }
        .dash-card:nth-child(2) { animation-delay: 0.2s; }
        .dash-card:nth-child(3) { animation-delay: 0.3s; }

        /* Divider */
        .dash-divider {
            text-align: center;
            margin: 3rem 0 2rem;
            color: rgba(255,255,255,0.2);
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        @media (max-width: 600px) {
            .dash-header { padding: 1rem 1.2rem; }
            .dash-main   { padding: 2rem 1rem; }
        }
    </style>
</head>
<body>
    <header class="dash-header">
        <a href="<?= route('home') ?>" class="dash-logo">
            <img src="<?= asset('img/logo.png') ?>" alt="Logo" onerror="this.style.display='none'"/>
            <span>Magik Beauty Gisel</span>
        </a>
        <a href="<?= route('logout') ?>" class="dash-logout">🚪 Cerrar Sesión</a>
    </header>

    <main class="dash-main">
        <div class="dash-welcome">
            <div class="welcome-avatar">💄</div>
            <h1>¡Hola, <?= htmlspecialchars($_SESSION['username'] ?? 'Usuaria') ?>!</h1>
            <p>Bienvenida a tu espacio personal en Magik Beauty Gisel</p>
        </div>

        <div class="dash-grid">
            <a href="<?= route('cursos') ?>" class="dash-card">
                <span class="card-icon">🎓</span>
                <h3>Cursos</h3>
                <p>Explora nuestros cursos profesionales de belleza y elige el que más te interesa.</p>
                <span class="card-arrow">Ver cursos →</span>
            </a>

            <a href="<?= route('home') ?>#servicios" class="dash-card">
                <span class="card-icon">✨</span>
                <h3>Servicios</h3>
                <p>Conoce todos los servicios que ofrecemos: pestañas, faciales y micropigmentación.</p>
                <span class="card-arrow">Ver servicios →</span>
            </a>

            <a href="https://wa.me/15123649251?text=Hola%2C%20quiero%20agendar%20una%20cita" 
               target="_blank" rel="noopener" class="dash-card">
                <span class="card-icon">📅</span>
                <h3>Agendar Cita</h3>
                <p>¿Lista para tu transformación? Agenda tu cita directamente por WhatsApp.</p>
                <span class="card-arrow">Contactar →</span>
            </a>
        </div>

        <div class="dash-divider">───── Magik Beauty Gisel • Austin, TX ─────</div>
    </main>
</body>
</html>
