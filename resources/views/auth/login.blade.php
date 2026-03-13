<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Iniciar Sesión — Magik Beauty Gisel</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet"/>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1a0a14 0%, #2d0a2d 50%, #0d0d1a 100%);
            position: relative;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 2rem 1rem;
        }

        /* Decorative blobs */
        body::before, body::after {
            content: '';
            position: fixed;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.35;
            pointer-events: none;
        }
        body::before {
            width: 500px; height: 500px;
            background: radial-gradient(circle, #ff69b4, #9932cc);
            top: -150px; left: -150px;
        }
        body::after {
            width: 400px; height: 400px;
            background: radial-gradient(circle, #9932cc, #ff1493);
            bottom: -120px; right: -120px;
        }

        .auth-card {
            background: rgba(255,255,255,0.04);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 3rem 2.5rem;
            width: 100%;
            max-width: 420px;
            margin: auto;
            position: relative;
            z-index: 1;
            box-shadow: 0 30px 80px rgba(0,0,0,0.5);
            animation: fadeSlideUp 0.6s cubic-bezier(0.4,0,0.2,1) forwards;
        }

        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .auth-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        .auth-logo a {
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
            text-decoration: none;
        }
        .auth-logo img {
            width: 48px; height: 48px;
            border-radius: 50%;
            border: 2px solid rgba(255,105,180,0.5);
        }
        .auth-logo span {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            color: #fff;
            white-space: nowrap;
        }

        .auth-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.9rem;
            color: #fff;
            text-align: center;
            margin-bottom: 0.4rem;
        }
        .auth-subtitle {
            color: rgba(255,255,255,0.5);
            font-size: 0.88rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .alert-error {
            background: rgba(255, 80, 80, 0.15);
            border: 1px solid rgba(255,80,80,0.35);
            color: #ffaaaa;
            border-radius: 10px;
            padding: 0.8rem 1rem;
            font-size: 0.88rem;
            margin-bottom: 1.4rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
            position: relative;
        }
        .form-group label {
            display: block;
            font-size: 0.8rem;
            font-weight: 600;
            color: rgba(255,255,255,0.6);
            letter-spacing: 1px;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }
        .form-group input {
            width: 100%;
            background: rgba(255,255,255,0.07);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 0.85rem 1.1rem;
            color: #fff;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            transition: border 0.25s, background 0.25s;
            outline: none;
        }
        .form-group input:focus {
            border-color: rgba(255,105,180,0.6);
            background: rgba(255,255,255,0.1);
        }
        .form-group input::placeholder { color: rgba(255,255,255,0.25); }

        /* Password toggle */
        .input-wrapper { position: relative; }
        .toggle-pw {
            position: absolute;
            right: 1rem; top: 50%;
            transform: translateY(-50%);
            background: none; border: none;
            cursor: pointer;
            color: rgba(255,255,255,0.35);
            font-size: 1.1rem;
            transition: color 0.2s;
            padding: 0;
        }
        .toggle-pw:hover { color: rgba(255,105,180,0.8); }

        .btn-auth {
            width: 100%;
            padding: 0.95rem;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #ff69b4, #9932cc);
            color: #fff;
            font-family: 'Inter', sans-serif;
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0.5px;
            cursor: pointer;
            margin-top: 0.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 8px 25px rgba(255,105,180,0.35);
        }
        .btn-auth:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 35px rgba(255,105,180,0.5);
        }
        .btn-auth:active { transform: translateY(0); }

        .auth-divider {
            text-align: center;
            color: rgba(255,255,255,0.25);
            font-size: 0.8rem;
            margin: 1.5rem 0 1.2rem;
            position: relative;
        }
        .auth-divider::before, .auth-divider::after {
            content: '';
            position: absolute;
            top: 50%;
            width: 38%;
            height: 1px;
            background: rgba(255,255,255,0.1);
        }
        .auth-divider::before { left: 0; }
        .auth-divider::after  { right: 0; }

        .auth-link-row {
            text-align: center;
            color: rgba(255,255,255,0.45);
            font-size: 0.88rem;
        }
        .auth-link-row a {
            color: #ff69b4;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.2s;
        }
        .auth-link-row a:hover { color: #ffaadd; }

        .back-home {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.4rem;
            margin-top: 1.5rem;
            color: rgba(255,255,255,0.3);
            font-size: 0.8rem;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-home:hover { color: rgba(255,255,255,0.6); }

        @media (max-width: 480px) {
            .auth-card { padding: 2rem 1.4rem; border-radius: 16px; }
        }
    </style>
</head>
<body>
    <div class="auth-card">
        <div class="auth-logo">
            <a href="<?= route('home') ?>">
                <img src="<?= asset('img/logo.png') ?>" alt="Logo" onerror="this.style.display='none'"/>
                <span>Magik Beauty Gisel</span>
            </a>
        </div>

        <h1 class="auth-title">Bienvenida</h1>
        <p class="auth-subtitle">Inicia sesión en tu cuenta</p>

        <?php if (!empty($error)): ?>
            <div class="alert-error">⚠ <?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= asset('login') ?>">
            <input type="hidden" name="_csrf" value="<?= htmlspecialchars($csrf ?? '') ?>"/>
            <input type="hidden" name="redirect" value="<?= htmlspecialchars($redirect ?? '') ?>"/>

            <div class="form-group">
                <label for="username">Usuario</label>
                <input type="text" id="username" name="username"
                       placeholder="Tu nombre de usuario"
                       required autocomplete="username"/>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password"
                           placeholder="••••••••"
                           required autocomplete="current-password"/>
                    <button type="button" class="toggle-pw" onclick="togglePw('password', this)"
                            aria-label="Mostrar contraseña">👁</button>
                </div>
            </div>

            <button type="submit" class="btn-auth">Iniciar Sesión</button>
        </form>

        <div class="auth-divider">o</div>

        <div class="auth-link-row">
            ¿No tienes cuenta? <a href="<?= route('register') ?>">Regístrate aquí</a>
        </div>

        <a href="<?= route('home') ?>" class="back-home">← Volver al inicio</a>
    </div>

    <script>
        function togglePw(id, btn) {
            const input = document.getElementById(id);
            if (input.type === 'password') {
                input.type = 'text';
                btn.textContent = '🙈';
            } else {
                input.type = 'password';
                btn.textContent = '👁';
            }
        }
    </script>
</body>
</html>
