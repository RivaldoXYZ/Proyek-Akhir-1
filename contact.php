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
            <a href="penginapan.php">Penginapan</a>
            <a href="about.php">Tentang Kami</a>
            <a href="contact.php">Kontak</a>
        </div>
        <div class="navbar-extra">
            <a href="#" id="search"><i data-feather="search"></i></a>
            <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Section Start -->
    <!-- Contact -->
    <section id="contact" class="contact">
        <h2><span>Kontak</span> Kami</h2>
        <p>Anda dapat mengirimkan pesan kepada kami melalui formulir kontak di bawah ini:</p>
        <div class="row">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3986.3673302250577!2d99.14643875009662!3d2.3832205580399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x302e00fdad2d7341%3A0xf59ef99c591fe451!2sInstitut%20Teknologi%20Del!5e0!3m2!1sid!2sid!4v1679909630657!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="map"></iframe>
            <form action="">
                <div class="input-group">
                    <i data-feather="user"></i>
                    <input type="text" name="nama" placeholder="Nama">
                </div>
                <div class="input-group">
                    <i data-feather="mail"></i>
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="input-group">
                    <i data-feather="phone"></i>
                    <input type="text" name="telp" placeholder="No.Telepon">
                </div>
                <div class="input-group">
                    <i data-feather="message-square"></i>
                    <textarea name=" pesan" rows="4" cols="30%" placeholder="Masukkan pesan Anda"></textarea>
                </div>
                <button type="submit" class="btn">Kirim Pesan</button>
            </form>
        </div>
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

    <!-- Section End -->

    <!-- Icon -->
    <script>
    feather.replace()
    </script>

    <script src=" js/index.js">
    </script>
</body>

</html>