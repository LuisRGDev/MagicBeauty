<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faciales - Magic Beauty</title>
    <link rel="stylesheet" href="<?= asset('css/styles.css') ?>">

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
            Magic Beauty
        </a>
        <nav class="nav-right">
            <ul>
                <li><a href="<?= route('home') ?>#servicios">Servicios</a></li>
                <li><a href="#contacto">Contacto</a></li>
            </ul>
        </nav>
        <!-- <a href="<?= route('home') ?>/cursos" class="cursos-btn">📚 Cursos</a> -->
        <button class="menu-toggle">☰</button>
    </header>

    <section class="hero" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?q=80&w=1376&auto=format&fit=crop');">
        <div class="hero-text animate-fade-in">
            <h1>Servicios Faciales</h1>
            <p class="subtitle">Rejuvenece y Revitaliza tu Piel</p>
            <p class="services-list">
                Limpieza Profunda · Dermapen · Radiofrecuencia · Alta Frecuencia
            </p>
            <a href="#servicios-faciales" class="cta-btn">Ver Tratamientos</a>
        </div>
    </section>

    <section class="about">
      <div class="about-content">
        <h2 class="section-title animate-slide-up">Cuidado de la Piel</h2>
        <div class="about-grid" style="grid-template-columns: 1fr;">
          <div class="about-card visible">
            <div class="about-icon">✨</div>
            <h3>Salud Dermatológica</h3>
            <p>
              Nuestros tratamientos faciales están diseñados no solo para embellecer, sino para mejorar la salud profunda de tu piel. Utilizamos tecnología de vanguardia y productos de alta gama para tratar imperfecciones, hidratar y devolverle la luminosidad a tu rostro.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="servicios-faciales" class="services">
        <h2 class="animate-slide-up">Nuestros Tratamientos</h2>
        <div class="services-container">
            <!-- Limpieza Profunda -->
            <div class="service-card animate-card" style="--delay: 0s">
                <img src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?q=80&w=1000&auto=format&fit=crop" alt="Limpieza Profunda" />
                <div class="service-content">
                    <h3>Limpieza Profunda</h3>
                    <p>Eliminación de impurezas, puntos negros y células muertas. Incluye vapor, extracción y mascarilla hidratante.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem; color: var(--primary-color);">Tiempo de aplicación: 1h</p>
                </div>
            </div>

            <!-- Dermapen -->
            <div class="service-card animate-card" style="--delay: 0.2s">
                <img src="https://plus.unsplash.com/premium_photo-1661481689382-4445fd07fd5f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8ZGVybWFwZW58ZW58MHx8MHx8fDA%3D" alt="Dermapen" />
                <div class="service-content">
                    <h3>Dermapen</h3>
                    <p>Micropunciones que estimulan la producción de colágeno y elastina. Ideal para cicatrices de acné y rejuvenecimiento.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem; color: var(--primary-color);">Tiempo de aplicación: 1h 15m</p>
                </div>
            </div>

            <!-- Radiofrecuencia -->
            <div class="service-card animate-card" style="--delay: 0.4s">
                <img src="https://plus.unsplash.com/premium_photo-1661270455059-0a4f6be356e4?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8c2VydmljaW8lMjBkZSUyMHJhZGlvZnJlY3VlbmNpYSUyMHBhcmElMjBsYSUyMHBpZWx8ZW58MHx8MHx8fDA%3D" alt="Radiofrecuencia" />
                <div class="service-content">
                    <h3>Radiofrecuencia</h3>
                    <p>Lifting sin cirugía. Reafirma la piel y reduce líneas de expresión mediante calor controlado.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem; color: var(--primary-color);">Tiempo de aplicación: 45m</p>
                </div>
            </div>

            <!-- Alta Frecuencia -->
            <div class="service-card animate-card" style="--delay: 0.6s">
                <img src="https://plus.unsplash.com/premium_photo-1661768548751-d2312e47a315?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8c2VydmljaW8lMjBkZSUyMGFsdGElMjBmcmVjdWVuY2lhJTIwcGFyYSUyMGxhJTIwcGllbHxlbnwwfHwwfHx8MA%3D%3D" alt="Alta Frecuencia" />
                <div class="service-content">
                    <h3>Alta Frecuencia</h3>
                    <p>Tratamiento bactericida y oxigenante. Perfecto para pieles con tendencia al acné y para cerrar poros.</p>
                    <p style="font-size: 0.9rem; margin-top: 0.5rem; color: var(--primary-color);">Tiempo de aplicación: 30m</p>
                </div>
            </div>
        </div>

        <div style="text-align: center; margin-top: 4rem;">
            <a href="https://wa.me/15123649251?text=Hola me gustaria agendar una cita para un facial" class="cta-btn" target="_blank">Agendar Cita</a>
        </div>
    </section>

    <section id="contacto" class="contact">
        <h2>Contacto</h2>
        <div class="contact-container">
            <form id="contact-form" class="animate-slide-up" action="https://formsubmit.co/luisalbertorosalesg@gmail.com" method="POST">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="email" name="email" placeholder="Correo Electrónico" required>
                <textarea name="mensaje" placeholder="Mensaje" required></textarea>
                <input type="hidden" name="_next" value="https://tuweb.com/gracias.html" />
                <button type="submit" class="submit-btn">Enviar Mensaje</button>
            </form>
            <div class="contact-info animate-fade-in">
                <p>📞 +1 (512) 364-9251</p>
                <p>📍 3710 Airport Blvd Austin TX 78722, "Claudia's"</p>
                <p>
                    <a href="https://wa.me/15123649251?text=Hola me gustaria obtener mas informacion sobre faciales!!" 
                    target="_blank" 
                    aria-label="Contactar por WhatsApp">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="whatsapp-icon">
                            <path fill="#25D366" d="M128 0C57.31 0 0 57.31 0 128c0 22.6 5.9 44.2 17.1 63.5L0 256l65.2-16.9c18.9 10.3 40.1 16 62.8 16 70.69 0 128-57.31 128-128S198.69 0 128 0Zm-2.4 226.3c-18.7 0-37-4.9-53.2-14.3l-3.8-2.2-38.8 10.1 10.3-37.6-2.5-4C27.3 162.3 22.4 145.2 22.4 128 22.4 69.1 69.1 22.4 128 22.4c58.9 0 105.6 46.7 105.6 105.6 0 58.9-46.7 105.6-105.6 105.6Zm61.6-76.6c-3.3-1.6-19.6-9.7-22.7-10.8-3.1-1.2-5.4-1.8-7.7 1.6s-8.9 10.8-10.9 13.1-4 2.4-7.3.8-14.3-5.2-27.2-16.6c-10-8.9-16.7-19.9-18.6-23.2s-1.9-5 .1-7.4c1.5-2 3.1-4.4 4.8-6.6s2.2-4 3.3-6.7.5-5.2-.2-7.4c-.7-2.2-7-17-9.6-23.4-2.6-6.4-5.3-6.5-7.8-6.6s-4.3 0-6.6.2-6 1.8-9.1 4.4-12 11.7-12 28.5 12.3 33.1 14.1 35.4 24 36.8 58.5 50.2c23.6 9.4 32.8 10.3 44.6 8.7s21.8-8.8 24.8-12.2 3.7-6.2 5.1-8.6 1.8-4.3 2.7-6.3 1.1-3.6.7-5.2c-.4-1.6-2.9-2.6-6.2-4.2Z"/>
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
            <a href="#" class="social-link" aria-label="Instagram">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>
            </a>
            <a href="#" class="social-link" aria-label="Facebook">
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
                 <a href="#" aria-label="Instagram">Instagram</a>
                 <a href="#" aria-label="Facebook">Facebook</a>
            </div>
        </div>
    </aside>

    <a href="https://wa.me/15123649251?text=Hola me gustaria agendar una cita!" class="whatsapp-float" target="_blank" aria-label="Chat en WhatsApp">
        <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
    </a>

    <script src="<?= asset('js/script.js') ?>"></script>
</body>
</html>
