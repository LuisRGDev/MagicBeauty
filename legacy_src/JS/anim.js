document.addEventListener('DOMContentLoaded', () => {
  const aboutBoxes = document.querySelectorAll('.about-box');

  // Crear el observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('show'); // Añadir la clase 'show' cuando el elemento está en el viewport
      } else {
        entry.target.classList.remove('show'); // Quitar la clase 'show' cuando el elemento sale del viewport
      }
    });
  }, { threshold: 0.1 }); // threshold determina cuánto del elemento debe estar visible (0.1 significa 10%)

  // Observar cada caja
  aboutBoxes.forEach((box) => {
    observer.observe(box);
  });
});