
  const sidebar   = document.getElementById('sidebar');
  const backdrop  = document.getElementById('backdrop');
  const menuToggle = document.getElementById('menuToggle');
  const navLinks  = document.querySelectorAll('.gc-nav-link');

  function isMobile(){
    return window.innerWidth < 768;
  }

  function toggleSidebar(){
    if (isMobile()){
      sidebar.classList.remove('collapsed');
      sidebar.classList.toggle('show');
      backdrop.classList.toggle('show');
    } else {
      sidebar.classList.toggle('collapsed');
    }
  }

  menuToggle.addEventListener('click', toggleSidebar);
  backdrop.addEventListener('click', () => {
    sidebar.classList.remove('show');
    backdrop.classList.remove('show');
  });

  window.addEventListener('resize', () => {
    if (!isMobile()){
      sidebar.classList.remove('show');
      backdrop.classList.remove('show');
    }
  });

  navLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      navLinks.forEach(l => l.classList.remove('active'));
      link.classList.add('active');
      if (isMobile()){
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
      }
    });
  });
