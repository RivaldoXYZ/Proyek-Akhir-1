<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Hotel/Penginapan/Tempat Hiburan di Danau Toba</title>
    <!-- JS -->
</head>

<body>
    <!-- Navbar Start-->
    <nav class="navbar">
        <a href="#" class="navbar-logo">Toba <span>Gateway</span></a>
        <div class="navbar-nav">
            <a href="#">Home</a>
            <a href="hotel.php">Hotel</a>
            <a href="#">Penginapan</a>
            <a href="#about">Tentang Kami</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap"
            rel="stylesheet">
        <!-- cSS -->
        <link rel="stylesheet" href="css/index.css">
    </nav>
    <!-- Navbar End -->
    <!-- Section Start -->
    <!-- Hero Section -->
    <section class="hero" id="home">
        <main class="content">
            <h1>Toba <span>Gateway</span></h1>
            <p>Find Your Perfect Guide to Hotels and Things to Do</p>
            <a href="#" class="cta"> Telusuri Hotel/Penginapan</a>
        </main>
    </section>
    <section id="menu" class="menu">
        <main class="hotel">
            <h2><span>Rekomendasi</span> Hotel</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, id.</p>
            <div class="row">
                <div class="menu-card">
                    <img src="#" alt="" class="menu-card-img">
                    <h3 class="menu-card-title">Hotel 1</h3>
                    <p class="menu-card-price">IDR 200K/malam</p>
                </div>
            </div>
        </main>
        <main class="penginapan">
            <h2><span>Rekomendasi</span> Hotel</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, id.</p>
            <div class="row">
                <div class="menu-card">
                    <img src="#" alt="" class="menu-card-img">
                    <h3 class="menu-card-title">Hotel 1</h3>
                    <p class="menu-card-price">IDR 200K/malam</p>
                </div>
            </div>
        </main>
        <script>
        // Agar Menu tidak kembali ke home
        var link = document.getElementById('hamburger-menu');
        link.addEventListener('click', function(event) {
            event.preventDefault();
        });
        </script>
    </section>
    <footer>
        <ul>
            <li><strong>Email:</strong> info@tobainformasi.com</li>
            <li><strong>Telepon:</strong> +62 812-3456-7890</li>
        </ul>
        <div class="social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="credit">
            <p>Created by <a href="">Kelompok 14.</a> | &copy; 2023.</p>
        </div>
    </footer>


    <!-- Icon -->
    <script>
    feather.replace()
    </script>

    <script src=" js/index.js">
    </script>
</body>

</html>