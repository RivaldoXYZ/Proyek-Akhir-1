<?php
require "Connection/koneksi.php";

$queryhotel = mysqli_query($con, "SELECT id, nama, alamat, foto, harga_terendah, harga_tertinggi, deskripsi FROM hotel WHERE akomodasi='hotel' LIMIT 6");
$querypenginapan = mysqli_query($con, "SELECT id, nama, alamat, foto, harga_terendah, harga_tertinggi, deskripsi FROM hotel WHERE akomodasi='penginapan' LIMIT 6");

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

    <section class="packages" id="hotel">
        <h1 class="heading">
            <span>H</span>
            <span>o</span>
            <span>t</span>
            <span>e</span>
            <span>l</span>
        </h1>
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
                        <p>
                            <?php echo $data['deskripsi'] ?>
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">
                            Rp.
                            <?php echo $data['harga_terendah'] ?> -
                            Rp.
                            <?php echo $data['harga_tertinggi'] ?>
                        </div>
                        <a href="detail_hotel.php?id=<?php echo $data['id'] ?>" class="btn">Detail</a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="more">
            <a href="hotel.php"><i class="fa-solid fa-angles-down"></i>&nbsp; See More</a>
        </div>
    </section>
    <section class="packages" id="hotel">
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
                        <p>
                            <?php echo $data['deskripsi'] ?>
                        </p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">
                            Rp.
                            <?php echo $data['harga_terendah'] ?> -
                            Rp.
                            <?php echo $data['harga_tertinggi'] ?>
                        </div>
                        <a href="detail_hotel.php?id=<?php echo $data['id'] ?>" class="btn">Detail</a>
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