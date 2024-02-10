const form = document.querySelector('form');

form.addEventListener('submit', function (event) {
  event.preventDefault();

  const idInput = document.querySelector('#Iduser');
  const nameInput = document.querySelector('#Name');
  const surnameInput = document.querySelector('#Surname');
  const ageInput = document.querySelector('#Age');
  const emailInput = document.querySelector('#Semail');
  const passwordInput = document.querySelector('#Spassword');
  const imgInput = document.querySelector('#Img');

  const idValue = idInput.value;
  const nameValue = nameInput.value;
  const surnameValue = surnameInput.value;
  const ageValue = ageInput.value;
  const emailValue = emailInput.value;
  const passwordValue = passwordInput.value;
  const imgValue = imgInput.value;

  const idRegex = /^\d+$/;
  const nameRegex = /^[a-zA-Z]+$/;
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  let isValid = true;

  if (!idRegex.test(idValue)) {
    isValid = false;
    idInput.classList.add('is-invalid');
  } else {
    idInput.classList.remove('is-invalid');
  }

  if (!nameRegex.test(nameValue)) {
    isValid = false;
    nameInput.classList.add('is-invalid');
  } else {
    nameInput.classList.remove('is-invalid');
  }

  if (!nameRegex.test(surnameValue)) {
    isValid = false;
    surnameInput.classList.add('is-invalid');
  } else {
    surnameInput.classList.remove('is-invalid');
  }

  if (!idRegex.test(ageValue)) {
    isValid = false;
    ageInput.classList.add('is-invalid');
  } else {
    ageInput.classList.remove('is-invalid');
  }

  if (!emailRegex.test(emailValue)) {
    isValid = false;
    emailInput.classList.add('is-invalid');
  } else {
    emailInput.classList.remove('is-invalid');
  }

  if (passwordValue.length < 6) {
    isValid = false;
    passwordInput.classList.add('is-invalid');
  } else {
    passwordInput.classList.remove('is-invalid');
  }

  if (!imgValue) {
    isValid = false;
    imgInput.classList.add('is-invalid');
  } else {
    imgInput.classList.remove('is-invalid');
  }
 

  if (isValid) {
    form.submit();
  }
});
