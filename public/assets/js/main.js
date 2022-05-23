// Event
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
