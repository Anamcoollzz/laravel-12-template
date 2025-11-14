// AnamChat Landing minimal JS
document.getElementById('hamburger').addEventListener('click', () => {
  const nav = document.getElementById('navLinks');
  nav.classList.toggle('open');
});

// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', (e) => {
    const id = a.getAttribute('href').slice(1);
    const el = document.getElementById(id);
    if(el){
      e.preventDefault();
      el.scrollIntoView({behavior:'smooth'});
      document.getElementById('navLinks').classList.remove('open');
    }
  });
});

// Simple waitlist (mailto fallback)
const form = document.getElementById('waitlistForm');
const msg = document.getElementById('formMsg');
form.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = document.getElementById('email').value.trim();
  if(!email){ msg.textContent = 'Email wajib diisi.'; return; }
  const mailto = `mailto:hairulanam21@gmail.com?subject=Waitlist%20AnamChat&body=Email:%20${encodeURIComponent(email)}`;
  window.location.href = mailto;
  msg.textContent = 'Terima kasih! Kami akan menghubungi Anda segera.';
});
