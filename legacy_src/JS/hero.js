const heroText = document.querySelector('.hero-text');
const ctaBtn = document.querySelector('.cta-btn');

heroText.style.opacity = 0;
ctaBtn.style.opacity = 0;

window.addEventListener('load', () => {
  heroText.style.transition = 'opacity 1s';
  ctaBtn.style.transition = 'opacity 1s';
  heroText.style.opacity = 1;
  ctaBtn.style.opacity = 1;
});