document.addEventListener('DOMContentLoaded', () => {
  if (window.lucide) { lucide.createIcons(); }
  if (window.AOS) { AOS.init({ once: true, duration: 600, easing: 'ease-out-cubic' }); }

  const btn = document.getElementById('menuBtn');
  const menu = document.getElementById('mobileMenu');
  if (btn && menu) {
    btn.addEventListener('click', () => {
      const open = menu.classList.contains('hidden');
      menu.classList.toggle('hidden');
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }
});
