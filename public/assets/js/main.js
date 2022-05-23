// Event
document.querySelectorAll('.menu-opts div').forEach((e) => {
  e.addEventListener('click', () => {
    const key = e.getAttribute('data-opt');
    document.querySelector('.menu-opts div.active').classList.remove('active');
    e.classList.add('active');
    const toggleForm = (last, next) => {
      document.querySelector(last).style.display = 'none';
      document.querySelector(last).style.order = '1';
      document.querySelector(next).style.display = 'flex';
      document.querySelector(next).style.order = '0';
    };
    if (key === '0') {
      toggleForm('#register', '#login');
    } else {
      toggleForm('#login', '#register');
    }
  });
});

window.addEventListener('load', () => {
  const actualPage = document.querySelector('#actualPage').getAttribute('data-page');
  document.querySelectorAll('#header .nav-bar ul li').forEach((e) => {
    if (e.getAttribute('data-page') === actualPage) {
      e.classList.add('active');
    } else {
      e.classList.remove('active');
    }
  });
});
