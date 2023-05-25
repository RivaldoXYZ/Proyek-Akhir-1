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

//efek scroll
const navBar = document.querySelector(".navbar");
window.addEventListener('scroll', () => {
    console.log(window.scrollY);
    const windowPosition = window.scrollY > 0;
    navBar.classList.toggle("scrolling-active", windowPosition);
})

// const searchBox = document.querySelector(".search-box");
// const searchBtn = document.querySelector(".search-icon");
// const cancelBtn = document.querySelector(".cancel-icon");
// const searchInput = document.querySelector("input");
// const searchData = document.querySelector(".search-data");

// searchBtn.onclick = () => {
//     searchBox.classList.add("active");
//     searchBtn.classList.add("active");
//     searchInput.classList.add("active");
//     cancelBtn.classList.add("active");
//     searchInput.focus();

//     if (searchInput.value !== "") {
//         var searchDataValue = searchInput.value;

//         // Kirim data pencarian ke server (contoh AJAX)
//         var xhr = new XMLHttpRequest();
//         xhr.open("POST", "proses_pencarian.php", true);
//         xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//         xhr.onreadystatechange = function () {
//             if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
//                 // Lakukan sesuatu dengan respons dari server
//                 searchData.innerHTML = xhr.responseText;
//                 searchData.classList.remove("active");
//             }
//         };
//         xhr.send("search=" + searchDataValue);
//     } else {
//         searchData.textContent = "";
//     }
// };

// cancelBtn.onclick = () => {
//     searchBox.classList.remove("active");
//     searchBtn.classList.remove("active");
//     searchInput.classList.remove("active");
//     cancelBtn.classList.remove("active");
//     searchData.classList.toggle("active");
//     searchInput.value = "";
// };