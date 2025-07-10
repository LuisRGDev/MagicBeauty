const serviceBoxes = document.querySelectorAll('.pest, .unas, .bot');

serviceBoxes.forEach((box) => {
  box.addEventListener('mouseover', () => {
    box.classList.add('hover');
  });
  box.addEventListener('mouseout', () => {
    box.classList.remove('hover');
  });
});

// Add CSS to style the hover effect
