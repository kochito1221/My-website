// Advanced Dropdown and Responsive Navbar Logic
document.addEventListener('DOMContentLoaded', function () {
    // Dropdown logic
    const dropdownBtn = document.getElementById('dropdownBtn');
    const dropdownList = document.getElementById('dropdownList');

    if (dropdownBtn && dropdownList) {
        dropdownBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            const isOpen = dropdownList.classList.toggle('show');
            dropdownBtn.setAttribute('aria-expanded', isOpen);
        });

        // Keyboard accessibility (Enter/Space toggles dropdown)
        dropdownBtn.addEventListener('keydown', function (e) {
            if (e.key === "Enter" || e.key === " ") {
                e.preventDefault();
                dropdownBtn.click();
            }
        });

        // Hide dropdown if clicking outside
        document.addEventListener('click', function (event) {
            if (!dropdownBtn.contains(event.target) && !dropdownList.contains(event.target)) {
                dropdownList.classList.remove('show');
                dropdownBtn.setAttribute('aria-expanded', false);
            }
        });

        // Optional: Escape key closes dropdown
        document.addEventListener('keydown', function (e) {
            if (e.key === "Escape") {
                dropdownList.classList.remove('show');
                dropdownBtn.setAttribute('aria-expanded', false);
            }
        });
    }

    // Responsive navbar logic
    const menuIcon = document.getElementById('menuIcon');
    const navbar = document.getElementById('mynavbar');
    if (menuIcon && navbar) {
        menuIcon.addEventListener('click', function () {
            navbar.classList.toggle('responsive');
            menuIcon.setAttribute('aria-expanded', navbar.classList.contains('responsive'));
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
  // Get all nav links and sections
  const navLinks = document.querySelectorAll('.modern-nav a');
  const sections = document.querySelectorAll('section');

  // Hide all paragraphs initially
  sections.forEach(section => {
    const para = section.querySelector('.section-paragraph');
    if (para) para.style.display = 'none';
    // Optional: hide buttons too if needed
    const btn = section.querySelector('.btn-glass');
    if (btn) btn.style.display = 'none';
  });

  // Show paragraph for clicked link
  navLinks.forEach(link => {
    link.addEventListener('click', function (e) {
      e.preventDefault();
      // Hide all paragraphs and buttons
      sections.forEach(section => {
        const para = section.querySelector('.section-paragraph');
        if (para) para.style.display = 'none';
        const btn = section.querySelector('.btn-glass');
        if (btn) btn.style.display = 'none';
      });
      // Get target section id from href
      const targetId = this.getAttribute('href').replace('#', '');
      const targetSection = document.getElementById(targetId);
      if (targetSection) {
        const para = targetSection.querySelector('.section-paragraph');
        if (para) para.style.display = 'block';
        const btn = targetSection.querySelector('.btn-glass');
        if (btn) btn.style.display = 'inline-block';
      }
    });
  });

  // Optionally, show home section paragraph by default
  const homeSection = document.getElementById('home');
  if (homeSection) {
    const para = homeSection.querySelector('.section-paragraph');
    if (para) para.style.display = 'block';
  }
});