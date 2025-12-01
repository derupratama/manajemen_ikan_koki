document.addEventListener('DOMContentLoaded', function () {
  var hamburger = document.querySelector('.hamburger');
  var overlay = document.querySelector('.mobile-overlay');
  var panel = document.querySelector('.mobile-panel');
  var closeBtns = document.querySelectorAll('.close-panel, .mobile-panel nav a');

  function setExpanded(val) {
    if (hamburger) hamburger.setAttribute('aria-expanded', String(!!val));
  }

  function openPanel() {
    if (!hamburger || !overlay || !panel) return;
    hamburger.classList.add('open');
    overlay.classList.add('active');
    panel.classList.add('active');
    setExpanded(true);
    document.body.style.overflow = 'hidden';
  }

  function closePanel() {
    if (!hamburger || !overlay || !panel) return;
    hamburger.classList.remove('open');
    overlay.classList.remove('active');
    panel.classList.remove('active');
    setExpanded(false);
    document.body.style.overflow = '';
  }

  if (hamburger) {
    hamburger.addEventListener('click', function () {
      if (hamburger.classList.contains('open')) closePanel(); else openPanel();
    });
    // make keyboard accessible
    hamburger.addEventListener('keydown', function (e) {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        if (hamburger.classList.contains('open')) closePanel(); else openPanel();
      }
    });
  }

  if (overlay) overlay.addEventListener('click', closePanel);

  closeBtns.forEach(function (el) { el.addEventListener('click', closePanel); });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') closePanel();
  });

  // close panel on resize to prevent stuck state
  window.addEventListener('resize', function () {
    if (window.innerWidth > 992) closePanel();
  });
});
