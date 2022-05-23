const formLogin = document.querySelector('#login');
const formRegister = document.querySelector('#register');

const FormValidator = {
  form: null,

  handleSubmit: (event) => {
    event.preventDefault();
    let send = true;

    FormValidator.clearErrors();

    const inputs = FormValidator.form.querySelectorAll('input');

    for (let i = 0; i < inputs.length; i++) {
      const input = inputs[i];
      const check = FormValidator.checkInput(input);
      if (check !== true) {
        send = false;
        FormValidator.showError(input, check);
      }
    }

    if (send) {
      FormValidator.form.submit();
    }
  },

  checkInput: (input) => {
    const rules = input.getAttribute('data-sec');
    const eRegex = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
    const pRegex = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
    if (rules !== null) {
      const rulesSplit = rules.split('|');
      for (const k in rulesSplit) {
        const rDetails = rulesSplit[k].split('=');
        switch (rDetails[0]) {
          case 'email':
            if (eRegex.test(input.value.toLowerCase())) {
              return 'field needs to be a valid email address';
            }
            break;
          case 'pwd':
            if (pRegex.test(input.value.toLowerCase())) {
              return 'field needs to be a valid email address';
            }
            break;
          case 'min':
            if (input.value.length < rDetails[1]) {
              return `field needs to be at least ${rDetails[1]} characters`;
            }
            break;
          case 'required':
            if (input.value === '') {
              return 'field is required';
            }
            break;
          default:
            break;
        }
      }
    }
    return true;
  },

  showError: (input, error) => {
    const errorElement = document.createElement('div');
    errorElement.classList.add('error');
    errorElement.innerHTML = `<ion-icon name="close-circle-outline"></ion-icon> ${input.getAttribute('id')} ${error}`;
    document.querySelector('.showErrors').append(errorElement);
  },
  clearErrors: () => {
    const errorElements = document.querySelectorAll('.error');
    for (let i = 0; i < errorElements.length; i++) {
      errorElements[i].remove();
    }
  },
};

// Event
document.querySelectorAll('.menu-opts div').forEach((e) => {
  FormValidator.form = formLogin;
  formLogin.addEventListener('submit', FormValidator.handleSubmit);
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
    if (key === '1') {
      toggleForm('#login', '#register');
      FormValidator.form = formRegister;
      formRegister.addEventListener('submit', FormValidator.handleSubmit);
    } else {
      toggleForm('#register', '#login');
      FormValidator.form = formLogin;
      formLogin.addEventListener('submit', FormValidator.handleSubmit);
    }
  });
});
