<?php
require "Connection/koneksi.php";
$queryhotel = mysqli_query($con, "SELECT * FROM hotel WHERE akomodasi='hotel'")

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
    <link rel="stylesheet" href="css/home_active.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <!-- Navbar Start-->
    <?php require('navbar_active.php') ?>
    <!-- Navbar End -->
    <div class="about-area">
        <div class="container-about">
            <div class="row-about">
                <div class="about-img">
                    <img src="img/foto3.jpg" alt="">
                </div>
                <div class="about-text">
                    <h2>About Us</h2>
                    <p>Danau Toba, dengan keindahan alamnya yang memukau, adalah tujuan wisata yang menakjubkan di
                        Indonesia. Sebagai platform informasi terpercaya, Tobagateway hadir untuk membantu para
                        wisatawan menemukan penginapan yang sempurna di sekitar Danau Toba. Kami bekerja sama dengan
                        berbagai akomodasi, mulai dari resor yang mewah hingga penginapan yang nyaman dan ramah
                        keluarga, untuk memastikan bahwa setiap tamu dapat menikmati pengalaman menginap yang tak
                        terlupakan di destinasi yang menakjubkan ini.</p>
                    <p>Dengan pengetahuan mendalam tentang Danau Toba dan sekitarnya, kami memberikan informasi yang
                        akurat dan terkini tentang fasilitas, layanan, dan lokasi dari setiap akomodasi yang kami ulas.
                        Kami memahami bahwa setiap tamu memiliki preferensi yang berbeda-beda, sehingga kami berusaha
                        untuk menyajikan pilihan yang beragam agar setiap wisatawan dapat menemukan akomodasi yang
                        sesuai dengan kebutuhan dan anggaran mereka.</p>
                    <p>Tobagateway juga menyediakan ulasan dan rekomendasi dari tamu sebelumnya, sehingga Anda dapat
                        mendapatkan wawasan langsung dari pengalaman mereka. Dengan dukungan dan bantuan kami, Anda
                        dapat dengan percaya diri merencanakan perjalanan Anda ke Danau Toba, mengetahui bahwa Anda akan
                        memiliki tempat menginap yang memenuhi harapan Anda. Jadi, bergabunglah dengan Tobagateway dalam
                        menjelajahi keindahan Danau Toba dan temukan akomodasi yang sempurna untuk liburan Anda!</p>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="faq">
        <div class="faq-container">
            <div class="faq-row">
                <div class="faq-wrapper">
                    <div class="faq-header">
                        <h1>FAQs</h1>
                    </div>
                    <div class="faq-inner">
                        <div class="faq-item">
                            <h3>
                                What is an FAQ page ?
                                <span class="faq-plus">&plus;</span>
                            </h3>
                            <div class="faq-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                        <hr>
                        <div class="faq-item">
                            <h3>
                                What is an FAQ page ?
                                <span class="faq-plus">&plus;</span>
                            </h3>
                            <div class="faq-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                        <hr>
                        <div class="faq-item">
                            <h3>
                                What is an FAQ page ?
                                <span class="faq-plus">&plus;</span>
                            </h3>
                            <div class="faq-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                        <hr>
                        <div class="faq-item">
                            <h3>
                                What is an FAQ page ?
                                <span class="faq-plus">&plus;</span>
                            </h3>
                            <div class="faq-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                        <hr>
                        <div class="faq-item">
                            <h3>
                                What is an FAQ page ?
                                <span class="faq-plus">&plus;</span>
                            </h3>
                            <div class="faq-body">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has been the industry's standard dummy text ever since the 1500s, when an unknown
                                printer took a galley of type and scrambled it to make a type specimen book.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div>
        <?php require("footer.php") ?>
    </div>
    <script src=" js/index_active.js"></script>
</body>

</html>