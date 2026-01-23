<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Magik Beauty</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>" />
  </head>
  <body>
    <header>
      <nav class="nav-left">
        <ul>
          <li><a href="#inicio">Inicio</a></li>
          <li><a href="#nosotros">Nosotros</a></li>
        </ul>
      </nav>
      <a href="<?= route('home') ?>" class="logo">
        <img src="<?= asset('img/logo.png') ?>" alt="logo" class="logo-img" />
        Magik Beauty
      </a>
      <nav class="nav-right">
        <ul>
          <li><a href="#servicios">Servicios</a></li>
          <li><a href="#contacto">Contacto</a></li>
        </ul>
      </nav>
      <!-- <a href="/login" class="cursos-btn">📚 Cursos</a> -->
      <button class="menu-toggle">☰</button>
    </header>

    <section id="inicio" class="hero">
      <div class="hero-text animate-fade-in">
        <h1>Magik Beauty</h1>
        <p class="subtitle">Realza tu Belleza Natural</p>
        <p class="services-list">
          Extension de Pestañas · Tratamientos Faciales · Micropigmentacion
        </p>
        <a href="#servicios" class="cta-btn"
          >Nuestros Servicios</a
        >
      </div>
    </section>

    <!-- Social Media Carousel -->
    <section class="social-carousel">
      <div class="carousel-container">
        <div class="carousel-track">
          <div class="carousel-slide">
            <img src="https://images.pexels.com/photos/3997386/pexels-photo-3997386.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&dpr=2" alt="TikTok" crossorigin="anonymous" />
            <a href="https://www.tiktok.com/@magikbeautygisel?_r=1&_t=ZT-91mWNgkfVVX" target="_blank" class="social-btn tiktok">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
              Ver en TikTok
            </a>
          </div>
          <div class="carousel-slide">
            <img src="https://images.pexels.com/photos/3373736/pexels-photo-3373736.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Instagram" crossorigin="anonymous" />
            <a href="https://www.instagram.com/magikbeauty__bygisel/?utm_source=qr&igsh=Y2N0bjJkM3BlOHE3#" target="_blank" class="social-btn instagram">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
              Síguenos en Instagram
            </a>
          </div>
          <div class="carousel-slide">
            <img src="https://images.pexels.com/photos/3373745/pexels-photo-3373745.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Facebook" crossorigin="anonymous" />
            <a href="https://www.facebook.com/profile.php?id=100064063332814&rdid=zkRjetzghBoTXe2Y&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17LBFWRzyw%2F#" target="_blank" class="social-btn facebook">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
              Síguenos en Facebook
            </a>
          </div>
          <!-- Duplicated for infinite loop -->
          <div class="carousel-slide">
            <img src="https://images.pexels.com/photos/3997386/pexels-photo-3997386.jpeg?auto=compress&cs=tinysrgb&w=1920&h=1080&dpr=2" alt="TikTok" crossorigin="anonymous" />
            <a href="https://www.tiktok.com/@magikbeautygisel?_r=1&_t=ZT-91mWNgkfVVX" target="_blank" class="social-btn tiktok">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
              Ver en TikTok
            </a>
          </div>
        </div>
      </div>
      <!-- Navigation Arrows -->
      <button class="carousel-arrow carousel-arrow-left">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
      </button>
      <button class="carousel-arrow carousel-arrow-right">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
      </button>
    </section>

    <section id="nosotros" class="about">
      <div class="about-content">
        <h2 class="section-title animate-slide-up">Nosotros</h2>
        <div class="about-grid">
          <div class="about-card" data-delay="0">
            <div class="about-icon">✨</div>
            <h3>Misión</h3>
            <p>
              Transformar la belleza natural de cada cliente con servicios
              personalizados y de alta calidad, creando experiencias únicas que
              realcen su confianza y bienestar.
            </p>
          </div>
          <div class="about-card" data-delay="0.2">
            <div class="about-icon">🎯</div>
            <h3>Visión</h3>
            <p>
              Ser el referente en innovación y excelencia en la industria de la
              belleza, marcando tendencias y superando expectativas con
              tratamientos de vanguardia.
            </p>
          </div>
          <div class="about-card" data-delay="0.4">
            <div class="about-icon">💫</div>
            <h3>Valores</h3>
            <p>
              Excelencia, profesionalismo, innovación, integridad y compromiso
              con la satisfacción total de nuestros clientes en cada servicio.
            </p>
          </div>
        </div>
        <div class="about-stats">
          <div class="stat-item">
            <div class="stat-icon">🏆</div>
            <span class="stat-number">5+</span>
            <p><span class="stat-label">Años de Experiencia</span></p>
          </div>
          <div class="stat-item">
            <div class="stat-icon">😊</div>
            <span class="stat-number">1000+</span>
            <p><span class="stat-label">Clientes satisfechos</span></p>
          </div>
          <div class="stat-item">
            <div class="stat-icon">👩‍⚕️</div>
            <span class="stat-label">Especialistas</span>
          </div>
        </div>
      </div>
    </section>

    <section id="servicios" class="services">
      <h2 class="animate-slide-up">Nuestros Servicios</h2>
      <div class="services-container">
        <div
          class="service-card animate-card"
          onclick="window.location.href='pestanas'"
          style="--delay: 0s; cursor: pointer"
        >
          <img
            src="https://images.unsplash.com/photo-1587910234573-d6fc84743bc8?q=80&w=1376&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            alt="Pestañas"
          />
          <div class="service-content">
            <h3>Extensión de pestañas</h3>
            <p>Extensiones clásicas, Volumen Ruso, Híbrida, Mega volumen.</p>
          </div>
        </div>

        <div
          class="service-card animate-card"
          onclick="window.location.href='faciales'"
          style="--delay: 0.2s; cursor: pointer"
        >
          <img
            src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8RmFjaWFsZXN8ZW58MHx8MHx8fDA%3D"
            alt="Uñas"
          />
          <div class="service-content">
            <h3>Faciales</h3>
            <p>
              Limpieza profunda, Dermapent, Alta fecuencia, Radiofrecuencia.
            </p>
          </div>
        </div>
        <div
          class="service-card animate-card"
          onclick="window.location.href='micorp'"
          style="--delay: 0.4s; cursor: pointer"
        >
          <img
            src="https://media.istockphoto.com/id/1282546631/es/foto/tiro-de-cerca-de-maquillaje-permanente-para-los-ojos-cosmet%C3%B3logo-aplicando-tatuajes-de-los.webp?a=1&b=1&s=612x612&w=0&k=20&c=FsGf0PeorVsaQElDmoZZ3R4qc1HWOnJcpNpozKKc-nM="
            alt="Botox"
          />
          <div class="service-content">
            <h3>Micropigmentacion</h3>
            <p>Cejas, Linea de ojos, Color en labios.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="contacto" class="contact">
      <h2>Contacto</h2>
      <div class="contact-container">
        <form
          id="contact-form"
          class="animate-slide-up"
          action="https://formsubmit.co/luisalbertorosalesg@gmail.com"
          method="POST"
        >
          <!-- Campos visibles -->
          <input type="text" name="nombre" placeholder="Nombre" required />
          <input
            type="email"
            name="email"
            placeholder="Correo Electrónico"
            required
          />
          <textarea name="mensaje" placeholder="Mensaje" required></textarea>
          <!-- Agradecimiento -->
          <input
            type="hidden"
            name="_next"
            value="https://tuweb.com/gracias.html"
          />

          <!-- Botón de envío -->
          <button type="submit" class="submit-btn">Enviar Mensaje</button>
        </form>

        <div class="contact-info animate-fade-in">
          <p>📞 +1 (512) 364-9251</p>
          <p>📍 3710 Airport Blvd Austin TX 78722, "Claudia's"</p>
          <p>
            <a
              href="https://wa.me/15123649251?text=Hola me gustaria obtener mas informacion sobre (servicio)!!"
              target="_blank"
              aria-label="Contactar por WhatsApp"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 256 256"
                class="whatsapp-icon"
              >
                <path
                  fill="#25D366"
                  d="M128 0C57.31 0 0 57.31 0 128c0 22.6 5.9 44.2 17.1 63.5L0 256l65.2-16.9c18.9 10.3 40.1 16 62.8 16 70.69 0 128-57.31 128-128S198.69 0 128 0Zm-2.4 226.3c-18.7 0-37-4.9-53.2-14.3l-3.8-2.2-38.8 10.1 10.3-37.6-2.5-4C27.3 162.3 22.4 145.2 22.4 128 22.4 69.1 69.1 22.4 128 22.4c58.9 0 105.6 46.7 105.6 105.6 0 58.9-46.7 105.6-105.6 105.6Zm61.6-76.6c-3.3-1.6-19.6-9.7-22.7-10.8-3.1-1.2-5.4-1.8-7.7 1.6s-8.9 10.8-10.9 13.1-4 2.4-7.3.8-14.3-5.2-27.2-16.6c-10-8.9-16.7-19.9-18.6-23.2s-1.9-5 .1-7.4c1.5-2 3.1-4.4 4.8-6.6s2.2-4 3.3-6.7.5-5.2-.2-7.4c-.7-2.2-7-17-9.6-23.4-2.6-6.4-5.3-6.5-7.8-6.6s-4.3 0-6.6.2-6 1.8-9.1 4.4-12 11.7-12 28.5 12.3 33.1 14.1 35.4 24 36.8 58.5 50.2c23.6 9.4 32.8 10.3 44.6 8.7s21.8-8.8 24.8-12.2 3.7-6.2 5.1-8.6 1.8-4.3 2.7-6.3 1.1-3.6.7-5.2c-.4-1.6-2.9-2.6-6.2-4.2Z"
                />
              </svg>
              <span>Contactar por WhatsApp</span>
            </a>
          </p>
        </div>
      </div>
    </section>

    <footer class="site-footer">
      <div class="footer-content">
        <div class="footer-column">
          <h3>Magik Beauty</h3>
          <p>Realza tu belleza natural con nuestros servicios profesionales de pestañas, faciales y micropigmentación.</p>
        </div>
        <div class="footer-column">
          <h3>Enlaces Rápidos</h3>
          <ul>
            <li><a href="<?= route('home') ?>">Inicio</a></li>
            <li><a href="<?= route('pestanas') ?>">Pestañas</a></li>
            <li><a href="<?= route('faciales') ?>">Faciales</a></li>
            <li><a href="<?= route('micorp') ?>">Micropigmentación</a></li>
          </ul>
        </div>
        <div class="footer-column">
          <h3>Contacto</h3>
          <p>📍 3710 Airport Blvd Austin TX 78722</p>
          <p>📞 +1 (512) 364-9251</p>
          <p>✉️ info@magikbeauty.com</p>
        </div>
        <div class="footer-column">
          <h3>Síguenos</h3>
          <div class="social-links">
            <a href="https://www.instagram.com/magikbeauty__bygisel/?utm_source=qr&igsh=Y2N0bjJkM3BlOHE3" class="social-link" aria-label="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="https://www.facebook.com/profile.php?id=100064063332814&rdid=zkRjetzghBoTXe2Y&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17LBFWRzyw%2F#" class="social-link" aria-label="Facebook">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>
            </a>
          </div>
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
                <li><a href="#contacto">Contacto</a></li>
            </ul>
            <div class="mobile-social">
                 <a href="https://www.instagram.com/magikbeauty__bygisel/?utm_source=qr&igsh=Y2N0bjJkM3BlOHE3#" aria-label="Instagram">Instagram</a>
                 <a href="https://www.facebook.com/profile.php?id=100064063332814&rdid=zkRjetzghBoTXe2Y&share_url=https%3A%2F%2Fwww.facebook.com%2Fshare%2F17LBFWRzyw%2F#" aria-label="Facebook">Facebook</a>
            </div>
        </div>
    </aside>

    <a href="https://wa.me/15123649251?text=Hola me gustaria agendar una cita!" class="whatsapp-float" target="_blank" aria-label="Chat en WhatsApp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>

    <script src="<?= asset('js/script.js') ?>"></script>
  </body>
</html>
