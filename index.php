<?php
require "Connection/koneksi.php";

$queryhotel = mysqli_query($con, "SELECT H.*, K.nama AS nama_kategori FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE akomodasi='hotel' AND SKOR>=3 LIMIT 6");
$querypenginapan = mysqli_query($con, "SELECT H.*, K.nama AS nama_kategori FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE akomodasi='penginapan' AND SKOR>=3 LIMIT 6");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Hotel/Penginapan/Tempat Hiburan di Danau Toba</title>
    <!-- Icon -->
    <script src="https://kit.fontawesome.com/636810249d.js" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">

    <!-- cSS -->
    <link rel="stylesheet" href="css/home.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <!-- Navbar Start-->
    <?php require('navbar.php') ?>

    <!-- Navbar End -->

    <!-- Hero Section -->
    <section class="hero" id="home">
        <main class="content">
            <h3>Welcome to A Toba icon of Luxury</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laborum, provident!</p>
        </main>
    </section>
    <!-- Service Section Start -->
    <section class="services" id="services">
        <div class="tittle">
            <h1 class="heading">
                <span>s</span>
                <span>e</span>
                <span>r</span>
                <span>v</span>
                <span>i</span>
                <span>c</span>
                <span>e</span>
                <span>s</span>
            </h1>
        </div>

        <div class="box-container">
            <div class="box">
                <i class="fa-solid fa-stamp"></i>
                <h3>Informasi Terpercaya</h3>
                <p>Lorem Ipsum is simply dummy text of the farhan and typesetting industry.
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-book"></i>
                <h3>Informasi Akurat</h3>
                <p>Lorem Ipsum is simply dummy text of the farhan and typesetting industry.
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry</p>
            </div>
            <div class="box">
                <i class="fa-solid fa-handshake-angle"></i>
                <h3>Dapat Menjadi Panduan</h3>
                <p>Lorem Ipsum is simply dummy text of the farhan and typesetting industry.
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry
                    Lorem Ipsum is simply dummy text of the farhan and typesetting industry</p>
            </div>
        </div>
    </section>
    <!-- Service Section End -->
    <section class="about-home" id="about-home">
        <div class="box-container">
            <div class="box">
                <h2>TobaGateway Informasi Hotel/Penginapan di sekitar Toba</h2>
                <p>
                    TobaGateway adalah sumber informasi terpercaya untuk hotel dan penginapan di sekitar Toba. Kami
                    menyediakan
                    daftar yang lengkap dan akurat tentang tempat-tempat menginap yang tersedia di wilayah ini.
                    Dengan TobaGateway, Anda dapat menemukan berbagai jenis akomodasi, mulai dari hotel mewah hingga
                    penginapan
                    budaya lokal. Setiap tempat menginap yang kami rekomendasikan telah melalui penilaian dan ulasan
                    dari
                    tamu
                    sebelumnya, sehingga Anda dapat memilih dengan percaya diri.
                </p>
                <p>
                    Selain itu, kami juga memberikan informasi tentang fasilitas, lokasi, harga, dan ketersediaan
                    tempat-tempat
                    menginap tersebut. Anda dapat dengan mudah membandingkan pilihan Anda dan melakukan reservasi
                    langsung
                    melalui TobaGateway.
                    Jadikan perjalanan Anda ke Toba lebih menyenangkan dengan TobaGateway sebagai panduan akomodasi
                    Anda.
                    Temukan tempat menginap yang sempurna dan nikmati pengalaman tak terlupakan di Toba.
                </p>
            </div>
        </div>
    </section>

    <section class="packages" id="hotel">
        <div class="tittle">
            <h1 class="heading">
                <span>H</span>
                <span>o</span>
                <span>t</span>
                <span>e</span>
                <span>l</span>
            </h1>
            <p>Berikut adalah List Hotel Terbaik di sekitar Toba Dengan skor Bitang 4 sampai Bintang 5</p>
        </div>
        <div class="box-container">

            <?php
            while ($data = mysqli_fetch_array($queryhotel)) {
                ?>

                <div class="box">
                    <img decoding="async" src="img/image/<?php echo $data['foto'] ?>" alt="">
                    <div class="content">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            <?php echo $data['alamat'] ?>
                        </p>
                        <h3>
                            <?php echo $data['nama'] ?>
                        </h3>
                        <div class="des">
                            <p>
                                Koordinat : <br>
                                <?php echo $data['kordinat'] ?>
                            </p>
                            <p>
                                Alamat : <br>
                                <?php echo $data['alamat'] ?>
                            </p>
                        </div>
                        <div class="stars">
                            <?php
                            $id_hotel = $data['id'];
                            $querystar = mysqli_query($con, "SELECT H.nama, K.nama AS nama_kategori, K.skor FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id = '$id_hotel'");
                            $star = mysqli_fetch_array($querystar);

                            $rating = $star['skor'];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Bintang penuh
                                } else {
                                    echo '<i class="far fa-star"></i>'; // Bintang kosong
                                }
                            }
                            ?>
                        </div>
                        <div class="price">
                            Rp.
                            <?php echo $data['harga_terendah'] ?> -
                            Rp.
                            <?php echo $data['harga_tertinggi'] ?>
                        </div>
                        <a href="detail.php?id=<?php echo $data['id'] ?>" class="btn">Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="more">
            <a href="hotel.php"><i class="fa-solid fa-angles-down"></i>&nbsp; See More</a>
        </div>
    </section>
    <section class="packages" id="hotel">
        <div class="tittle">
            <h1 class="heading">
                <span>P</span>
                <span>e</span>
                <span>n</span>
                <span>g</span>
                <span>i</span>
                <span>n</span>
                <span>a</span>
                <span>p</span>
                <span>a</span>
                <span>n</span>
            </h1>
            <p>Berikut adalah List Penginapan Terbaik di sekitar Toba Dengan skor Bitang 4 sampai Bintang 5</p>
        </div>
        <div class="box-container">
            <?php
            while ($penginapan = mysqli_fetch_array($querypenginapan)) {
                ?>
                <div class="box">
                    <img decoding="async" src="img/image/<?php echo $penginapan['foto'] ?>" alt="">
                    <div class="content">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            <?php echo $penginapan['alamat'] ?>
                        </p>
                        <h3>
                            <?php echo $penginapan['nama'] ?>
                        </h3>
                        <div class="des">
                            <p>
                                Koordinat : <br>
                                <?php echo $penginapan['kordinat'] ?>
                            </p>
                            <p>
                                Alamat : <br>
                                <?php echo $penginapan['alamat'] ?>
                            </p>
                        </div>
                        <div class="stars">
                            <?php
                            $id_hotel = $penginapan['id'];
                            $querystar = mysqli_query($con, "SELECT H.nama, K.nama AS nama_kategori, K.skor FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id = '$id_hotel'");
                            $star = mysqli_fetch_array($querystar);

                            $rating = $star['skor'];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Bintang penuh
                                } else {
                                    echo '<i class="far fa-star"></i>'; // Bintang kosong
                                }
                            }
                            ?>
                        </div>
                        <div class="price">
                            Rp.
                            <?php echo $penginapan['harga_terendah'] ?> -
                            Rp.
                            <?php echo $penginapan['harga_tertinggi'] ?>
                        </div>
                        <a href="detail.php?id=<?php echo $penginapan['id'] ?>" class="btn">Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="more">
            <a href="penginapan.php"><i class="fa-solid fa-angles-down"></i>&nbsp; See More</a>
        </div>
    </section>


    <!-- <section class="review" id="review">
        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1>
        <div class="swiper mySwiper review-slider">
            <div class="swiper-wrapper wrapper">
                <div class="swiper-slide">
                    <div class="box">
                        <img decoding="async" src="img/pic1.png" alt="">
                        <h3>Person 1</h3>
                        <p>Lorem Ipsum is simply dummy text of the farhan and typesetting industry.
                            Lorem Ipsum is simply dummy text of the farhan and typesetting industry
                            Lorem Ipsum is simply dummy text of the farhan and typesetting industry
                            farhan and typesetting industry.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


    <?php require("footer.php") ?>
    <!-- <footer>
        <ul>
            <li><strong>Email:</strong> info@tobainformasi.com</li>
            <li><strong>Telepon:</strong> +62 812-3456-7890</li>
        </ul>
        <div class="social">
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-twitter"></i></a>
            <a href="#"><i class="fa-brands fa-facebook"></i></a>
        </div>
        <div class="credit">
            <p>Created by <a href="">Kelompok 14.</a> | &copy; 2023.</p>
        </div>
    </footer> -->
    <script src=" js/index.js"></script>


</body>

</html>