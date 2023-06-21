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

// Menambahkan event listener ke setiap elemen FAQ
const faqItems = document.querySelectorAll('.faq-item');

faqItems.forEach((item) => {
    const question = item.querySelector('h3');
    const answer = item.querySelector('.faq-body');

    // Menambahkan event listener untuk mengubah tampilan jawaban saat pertanyaan diklik
    question.addEventListener('click', () => {
        item.classList.toggle('active');
        answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
    });
});

document.addEventListener('DOMContentLoaded', function () {
    var searchBox = document.querySelector(".search-box");
    var searchBtn = document.querySelector(".search-icon");
    var cancelBtn = document.querySelector(".cancel-icon");
    var searchInput = document.querySelector("input");
    var searchData = document.querySelector(".search-data");
    var searchForm = document.getElementById('searchForm');
    var submitButton = document.getElementById('submitButton');

    searchBtn.addEventListener('click', function () {
        searchBox.classList.add("active");
        searchBtn.classList.add("active");
        searchInput.classList.add("active");
        cancelBtn.classList.add("active");
        searchInput.focus();
    });

    cancelBtn.addEventListener('click', function () {
        searchBox.classList.remove("active");
        searchBtn.classList.remove("active");
        searchInput.classList.remove("active");
        cancelBtn.classList.remove("active");
        searchInput.value = "";
        submitButton.disabled = true;
    });

    searchInput.addEventListener('input', function () {
        if (searchInput.value.trim() !== "") {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });

    searchForm.addEventListener('submit', function (e) {
        if (!searchInput.classList.contains('active')) {
            e.preventDefault();
        }
    });
    searchInput.addEventListener('input', function () {
        if (searchInput.value.trim() !== "") {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    });

    searchForm.addEventListener('submit', function (e) {
        if (!searchInput.classList.contains('active')) {
            e.preventDefault();
        }
    });
});

window.addEventListener('load', function () {
    // Menghapus event listener pada saat submit form
    document.querySelector('form').addEventListener('submit', function () {
        // Menghapus event listener pada saat unload (pemuatan ulang) halaman
        window.onbeforeunload = null;
    });
});

const starFilterSelect = document.getElementById('star-filter');

starFilterSelect.addEventListener('change', function () {
    const selectedValue = this.value;

    // Mengarahkan ke URL dengan parameter filter yang sesuai
    const currentUrl = new URL(window.location.href);
    currentUrl.searchParams.set('star-filter', selectedValue);
    window.location.href = currentUrl.toString();
});

function goback() {
    window.history.back();
}