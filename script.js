// Menú Móvil
(() => {
    const menuToggle = document.querySelector('.menu-toggle');
    const nav = document.querySelector('nav ul');

    // Mostrar u ocultar el menú al hacer clic en el botón
    menuToggle.addEventListener('click', () => {
        nav.classList.toggle('active');
    });

    // Cerrar el menú al hacer clic en un enlace
    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('active');
        });
    });
})();

// Animación de Scroll Suave
(() => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            target.scrollIntoView({ behavior: 'smooth' });
        });
    });
})();

// Animación de Aparición al Scroll
(() => {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Observar elementos con animaciones
    document.querySelectorAll('.animate-slide-up, .service-card').forEach(element => {
        observer.observe(element);
    });
})();

// Efecto Parallax en el Hero
(() => {
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            hero.style.backgroundPositionY = `${scrolled * 0.5}px`;
        });
    }
})();

// Manejo del Formulario de Contacto
(() => {
    const form = document.getElementById('contact-form');
    const submitButton = document.querySelector('.submit-btn');

    form.addEventListener('submit', async (e) => {
        e.preventDefault();
        const formData = new FormData(form);

        // Cambiar el estado del botón mientras se envía
        submitButton.disabled = true;
        submitButton.textContent = 'Enviando...';

        try {
            const response = await fetch('https://formsubmit.co/luisalbertorosalesg@gmail.com', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                const result = await response.text();
                alert(result); // Mostrar el mensaje del servidor
                form.reset(); // Limpiar el formulario
            } else {
                alert('Hubo un problema al enviar el formulario.');
            }
        } catch (error) {
            console.error('Error al enviar el formulario:', error);
            alert('No se pudo enviar el formulario. Por favor, inténtalo más tarde.');
        } finally {
            // Restaurar el estado del botón
            submitButton.disabled = false;
            submitButton.textContent = 'Enviar Mensaje';
        }
    });
})();

// Animación de Shimmer para Elementos Destacados
(() => {
    const addShimmerEffect = (element) => {
        element.style.backgroundImage = 'linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent)';
        element.style.backgroundSize = '200% 100%';
        element.style.animation = 'shimmer 2s infinite';
    };

    document.querySelectorAll('.cta-btn, .submit-btn').forEach(addShimmerEffect);
})();

// Animaciones de Tarjetas "About"
(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const aboutCards = document.querySelectorAll('.about-card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        aboutCards.forEach(card => observer.observe(card));
    });
})();

// Estadísticas (Animación al Scroll)
(() => {
    document.addEventListener('DOMContentLoaded', () => {
        const stats = document.querySelectorAll('.stat-item');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1 });

        stats.forEach(stat => observer.observe(stat));
    });
})();

// Efecto de Desvanecimiento al Cambiar Página
(() => {
    document.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', event => {
            document.body.classList.add('fade-out');
        });
    });
})();
