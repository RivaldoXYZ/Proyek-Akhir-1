// Toogle Class Active
const navbarNav = document.querySelector('.navbar-nav');

// Event
document.querySelector('#hamburger-menu').onclick = () => {
    navbarNav.classList.toggle('active');
};


// Klik di luar
const hamburger = document.querySelector('#hamburger-menu');

document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});


// Agar Menu tidak kembali ke home
var link = document.getElementById('hamburger-menu');
link.addEventListener('click', function (event) {
    event.preventDefault();
});