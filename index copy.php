<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Hotel/Penginapan/Tempat Hiburan di Danau Toba</title>
    <!-- JS -->

    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <!-- cSS -->
    <link rel="stylesheet" href="css/index.css">

</head>


<body>
    <!-- Navbar Start-->
    <nav class="navbar">
        <a href="index.php" class="navbar-logo">Toba <span>Gateway</span></a>
        <div class="navbar-nav">
            <a href="index.php">Home</a>
            <a href="hotel.php">Hotel</a>
            <a href="#">Penginapan</a>
            <a href="about.php">Tentang Kami</a>
            <a href="#contact">Kontak</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
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

    <!-- About Section -->
    <section class="about" id="about">
        <h2><span>Tentang</span> Kami</h2>
        <div class="row">
            <div class="about-img">
                <img src="img/foto1.jpg" alt="Tentang Kami">
            </div>
            <div class="content">
                <h3>Kenapa Harus memilih Hotel/Penginapan</h3>
                <p> Pada saat ini hotel memang berkembang pesat terutama didaerah perkotaan dan parawisata sehingga kata
                    hotel tentu saja tidak asing lagi ditelinga kita. Di kota-kota besar Indonesia seperti Medan,
                    Jakarta,Bandung ,Surabaya serta daerah pariwisata seperti Samosir terdapat berbagi hotel dan
                    penginapan sudah terdapat berbagi hotel dan penginapanmulai dari tarifnya yang murah sampai tarifnya
                    yang mahal.
                </p>
                <p> Hotel merupakan salah satu jenis akomodasi yang mempergunakan sebagian atau keseluruhan bagian untuk
                    jasa pelayanan penginapan, penyedia makanan dan minuman serta jasa lainnya bagi masyarakat umum yang
                    dapat dikelola secara komersil.</p>
            </div>
        </div>
    </section>
    <!-- Menu -->
    <section id="menu" class="menu">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, id.</p>
        <div class="row">
            <div class="menu-card">
                <img src="#" alt="" class="menu-card-img">
                <h3 class="menu-card-title">Hotel 1</h3>
                <p class="menu-card-price">IDR 200K/malam</p>
            </div>
        </div>
    </section>

    <!-- Contact -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore, id.</p>
    </section>

    <footer>
        <div class="social">
            <a href="#"><i data-feather="instagram"></i></a>
            <a href="#"><i data-feather="twitter"></i></a>
            <a href="#"><i data-feather="facebook"></i></a>
        </div>
        <div class="credit">
            <p>Created by <a href="">Kelompok 14.</a> | &copy; 2023.</p>
        </div>
    </footer>

    <!-- Section End -->

    <!-- Icon -->
    <script>
    feather.replace()
    </script>

    <script src=" js/index.js">
    </script>
</body>

</html>