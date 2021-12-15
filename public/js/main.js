const target = document.getElementById("menu");
target.addEventListener('click', () => {
  const target = document.getElementById("menu");
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});

const inputDate = document.getElementById('inputDate');
const inputTime = document.getElementById('inputTime');
const inputNumber = document.getElementById('inputNumber');

const outputDate = document.getElementById('outputDate');
const outputTime = document.getElementById('outputTime');
const outputNumber = document.getElementById('outputNumber');

inputDate.addEventListener('change', function () {
    Date.textContent = inputDate.value;
});
inputTime.addEventListener('change', function () {
    Time.textContent = inputTime.value;
});
inputNumber.addEventListener('change', function () {
    number.textContent = inputNumber.value + "名";
});
