// Event
document.querySelectorAll('.menu-opts div').forEach((e) => {
  e.addEventListener('click', () => {
    const key = e.getAttribute('data-opt');
    document.querySelector('.menu-opts div.active').classList.remove('active');
    e.classList.add('active');
<<<<<<< HEAD
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
=======
    if (key === '0') {
      document.querySelector('#register').style.display = 'none';
      document.querySelector('#login').style.display = 'flex';
    } else {
      document.querySelector('#login').style.display = 'none';
      document.querySelector('#register').style.display = 'flex';
>>>>>>> 301e25dcca4c5f4ac5908cf480d51a9ad722575d
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
