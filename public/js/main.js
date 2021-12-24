const target = document.getElementById("menu");
target.addEventListener('click', () => {
  const target = document.getElementById("menu");
  target.classList.toggle('open');
  const nav = document.getElementById("nav");
  nav.classList.toggle('in');
});

let date = document.getElementById('date');
let outputDate = document.getElementById('outputDate');

let time = document.getElementById('time');
let outputTime = document.getElementById('outputTime');

let num_of_users = document.getElementById('num_of_users');
let outputNumber = document.getElementById('outputNumber');

timestamp = 0;

function update() {

    timestamp++;
    window.requestAnimationFrame(update);

    if (timestamp % 10 == 0 ){
      outputDate.innerHTML = date.value;
      outputTime.innerHTML = time.value;
      outputNumber.innerHTML = num_of_users.value;
    }
}
update();

