// ========== Menú Móvil (New Sidebar) ==========
(() => {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuClose = document.querySelector('.menu-close');
    const mobileNav = document.querySelector('.mobile-nav');
    const mobileOverlay = document.querySelector('.mobile-menu-overlay');

    const toggleMenu = () => {
        mobileNav.classList.toggle('active');
        mobileOverlay.classList.toggle('active');
        document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
    };

    const closeMenu = () => {
        mobileNav.classList.remove('active');
        mobileOverlay.classList.remove('active');
        document.body.style.overflow = '';
    };

    if (menuToggle) {
        menuToggle.addEventListener('click', toggleMenu);
    }

    if (menuClose) {
        menuClose.addEventListener('click', closeMenu);
    }

    if (mobileOverlay) {
        mobileOverlay.addEventListener('click', closeMenu);
    }

    // Close menu when clicking internal links
    document.querySelectorAll('.mobile-links a').forEach(link => {
        link.addEventListener('click', closeMenu);
    });
})();

// ========== Social Media Carousel Auto-Scroll ==========
(() => {
    const carouselTrack = document.querySelector('.carousel-track');

    if (carouselTrack) {
        const slides = document.querySelectorAll('.carousel-slide');
        const leftArrow = document.querySelector('.carousel-arrow-left');
        const rightArrow = document.querySelector('.carousel-arrow-right');
        const realSlides = 3;
        let currentSlide = 0;
        let isTransitioning = false;

        const updateCarousel = (transition = true) => {
            if (transition) {
                carouselTrack.style.transition = 'transform 0.6s ease-in-out';
                isTransitioning = true;
            } else {
                carouselTrack.style.transition = 'none';
                isTransitioning = false;
            }
            carouselTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
        };

        // Handle transition end to loop back seamlessly
        carouselTrack.addEventListener('transitionend', () => {
            if (currentSlide === realSlides) {
                currentSlide = 0;
                updateCarousel(false); // Jump instantly to start
            }
            isTransitioning = false;
        });

        const autoScroll = () => {
            if (isTransitioning) return;
            currentSlide++;
            updateCarousel(true);
        };

        // Auto-scroll every 8 seconds
        let autoScrollInterval = setInterval(autoScroll, 8000);

        // Arrow navigation
        if (leftArrow) {
            leftArrow.addEventListener('click', () => {
                if (isTransitioning) return;

                if (currentSlide === 0) {
                    currentSlide = realSlides;
                    updateCarousel(false); // Jump to end duplicate instantly
                    // Force reflow to ensure the jump happens before animation
                    void carouselTrack.offsetWidth;
                    currentSlide--;
                    updateCarousel(true);
                } else {
                    currentSlide--;
                    updateCarousel(true);
                }

                clearInterval(autoScrollInterval);
                autoScrollInterval = setInterval(autoScroll, 8000);
            });
        }

        if (rightArrow) {
            rightArrow.addEventListener('click', () => {
                if (isTransitioning) return;
                autoScroll();
                clearInterval(autoScrollInterval);
                autoScrollInterval = setInterval(autoScroll, 8000);
            });
        }

        // Pause auto-scroll on hover
        const carouselContainer = document.querySelector('.carousel-container');
        if (carouselContainer) {
            carouselContainer.addEventListener('mouseenter', () => {
                clearInterval(autoScrollInterval);
            });

            carouselContainer.addEventListener('mouseleave', () => {
                autoScrollInterval = setInterval(autoScroll, 8000);
            });
        }
    }
})();

// ========== Scroll Progress Bar ==========
(() => {
    const scrollProgress = document.querySelector('.scroll-progress');

    window.addEventListener('scroll', () => {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.scrollY / windowHeight) * 100;
        if (scrollProgress) {
            scrollProgress.style.width = scrolled + '%';
        }
    });
})();

// ========== Animación de Scroll Suave ==========
(() => {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);

            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
            // If target doesn't exist (e.g. cross-page link), let default behavior happen
        });
    });
})();

// ========== Animación de Aparición al Scroll ==========
(() => {
    const observerOptions = {
        threshold: 0.15, // Increased threshold for better triggering
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
                // Optional: Stop observing once animated
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observar elementos con animaciones
    document.querySelectorAll('.animate-slide-up, .service-card, .about-card, .stat-item').forEach(element => {
        // Set initial state via JS to ensure it matches if CSS fails or loads late
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'all 0.8s ease-out';
        observer.observe(element);
    });
})();

// ========== Efecto Parallax en el Hero ==========
/*
(() => {
    const hero = document.querySelector('.hero');
    if (hero) {
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            hero.style.backgroundPositionY = `${scrolled * 0.5}px`;
        });
    }
})();
*/

// ========== Manejo del Formulario de Contacto ==========
(() => {
    const form = document.getElementById('contact-form');
    const submitButton = document.querySelector('.submit-btn');

    if (form && submitButton) {
        // Validación en tiempo real
        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.addEventListener('blur', function () {
                if (this.value.trim() === '') {
                    this.style.borderColor = '#ff4444';
                } else {
                    this.style.borderColor = 'var(--primary-color)';
                }
            });

            input.addEventListener('input', function () {
                if (this.value.trim() !== '') {
                    this.style.borderColor = 'var(--primary-color)';
                }
            });
        });

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(form);

            // Cambiar el estado del botón mientras se envía
            submitButton.disabled = true;
            submitButton.textContent = 'Enviando...';
            submitButton.style.opacity = '0.7';

            try {
                const response = await fetch('https://formsubmit.co/luisalbertorosalesg@gmail.com', {
                    method: 'POST',
                    body: formData
                });

                if (response.ok) {
                    alert('¡Mensaje enviado con éxito! Nos pondremos en contacto contigo pronto.');
                    form.reset();
                } else {
                    alert('Hubo un problema al enviar el formulario. Por favor, inténtalo de nuevo.');
                }
            } catch (error) {
                console.error('Error al enviar el formulario:', error);
                alert('No se pudo enviar el formulario. Por favor, inténtalo más tarde.');
            } finally {
                // Restaurar el estado del botón
                submitButton.disabled = false;
                submitButton.textContent = 'Enviar Mensaje';
                submitButton.style.opacity = '1';
            }
        });
    }
})();

// ========== Animaciones de Tarjetas "About" ==========
(() => {
    const aboutCards = document.querySelectorAll('.about-card');
    const observer = new IntersectionObserver(entries => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });

    aboutCards.forEach(card => observer.observe(card));
})();

// ========== Estadísticas (Animación al Scroll) ==========
(() => {
    const stats = document.querySelectorAll('.stat-item');
    const observer = new IntersectionObserver(entries => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100);
            }
        });
    }, { threshold: 0.1 });

    stats.forEach(stat => observer.observe(stat));
})();

// ========== Carrusel de Testimonios ==========
(() => {
    const testimonialCards = document.querySelectorAll('.testimonial-card');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.querySelector('.testimonial-nav.prev');
    const nextBtn = document.querySelector('.testimonial-nav.next');
    let currentSlide = 0;
    let autoPlayInterval;

    function showSlide(index) {
        testimonialCards.forEach(card => {
            card.classList.remove('active');
        });
        dots.forEach(dot => {
            dot.classList.remove('active');
        });

        if (index >= testimonialCards.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = testimonialCards.length - 1;
        } else {
            currentSlide = index;
        }

        testimonialCards[currentSlide].classList.add('active');
        dots[currentSlide].classList.add('active');
    }

    function nextSlide() {
        showSlide(currentSlide + 1);
    }

    function prevSlide() {
        showSlide(currentSlide - 1);
    }

    function startAutoPlay() {
        autoPlayInterval = setInterval(nextSlide, 5000);
    }

    function stopAutoPlay() {
        clearInterval(autoPlayInterval);
    }

    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            stopAutoPlay();
            startAutoPlay();
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
            stopAutoPlay();
            startAutoPlay();
        });
    }

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopAutoPlay();
            startAutoPlay();
        });
    });

    // Iniciar autoplay
    if (testimonialCards.length > 0) {
        startAutoPlay();
    }

    // Pausar autoplay cuando el mouse está sobre el carrusel
    const testimonialContainer = document.querySelector('.testimonials-container');
    if (testimonialContainer) {
        testimonialContainer.addEventListener('mouseenter', stopAutoPlay);
        testimonialContainer.addEventListener('mouseleave', startAutoPlay);
    }
})();

// ========== Galería con Hover Effects ==========
(() => {
    const galleryItems = document.querySelectorAll('.gallery-item');

    galleryItems.forEach(item => {
        item.addEventListener('click', function () {
            const img = this.querySelector('img');
            if (img) {
                // Crear lightbox simple
                const lightbox = document.createElement('div');
                lightbox.style.cssText = `
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.95);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 10000;
                    cursor: pointer;
                `;

                const lightboxImg = document.createElement('img');
                lightboxImg.src = img.src;
                lightboxImg.style.cssText = `
                    max-width: 90%;
                    max-height: 90%;
                    border-radius: 10px;
                    box-shadow: 0 0 50px rgba(255, 105, 180, 0.5);
                `;

                lightbox.appendChild(lightboxImg);
                document.body.appendChild(lightbox);

                lightbox.addEventListener('click', () => {
                    document.body.removeChild(lightbox);
                });
            }
        });
    });
})();

// ========== Scroll to Top Button ==========
(() => {
    const scrollToTopBtn = document.querySelector('.scroll-to-top');

    if (scrollToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        });

        scrollToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
})();

// ========== Lazy Loading de Imágenes ==========
(() => {
    const images = document.querySelectorAll('img[loading="lazy"]');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }
})();

// ========== Animación de Números en Stats ==========
(() => {
    const statNumbers = document.querySelectorAll('.stat-number');

    const animateNumber = (element) => {
        const target = parseInt(element.textContent);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;

        const updateNumber = () => {
            current += increment;
            if (current < target) {
                element.textContent = Math.floor(current) + '+';
                requestAnimationFrame(updateNumber);
            } else {
                element.textContent = target + '+';
            }
        };

        updateNumber();
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                animateNumber(entry.target);
                entry.target.classList.add('animated');
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => observer.observe(stat));
})();

// ========== Efecto de Partículas en Hero ==========
(() => {
    const heroParticles = document.querySelector('.hero-particles');

    if (heroParticles) {
        // Crear partículas animadas
        for (let i = 0; i < 20; i++) {
            const particle = document.createElement('div');
            particle.style.cssText = `
                position: absolute;
                width: ${Math.random() * 4 + 2}px;
                height: ${Math.random() * 4 + 2}px;
                background: rgba(255, 105, 180, ${Math.random() * 0.5 + 0.3});
                border-radius: 50%;
                top: ${Math.random() * 100}%;
                left: ${Math.random() * 100}%;
                animation: float ${Math.random() * 10 + 10}s infinite ease-in-out;
                animation-delay: ${Math.random() * 5}s;
            `;
            heroParticles.appendChild(particle);
        }
    }
})();

console.log('✨ Magic Beauty - Website Enhanced! ✨');
