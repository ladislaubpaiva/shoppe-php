// Event
document.querySelectorAll('.menu-opts div').forEach((e) => {
  e.addEventListener('click', () => {
    const key = e.getAttribute('data-opt');
    document.querySelector('.menu-opts div.active').classList.remove('active');
    e.classList.add('active');
    if (key === '0') {
      document.querySelector('#register').style.display = 'none';
      document.querySelector('#login').style.display = 'flex';
    } else {
      document.querySelector('#login').style.display = 'none';
      document.querySelector('#register').style.display = 'flex';
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
