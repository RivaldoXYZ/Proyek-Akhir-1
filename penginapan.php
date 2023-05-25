<?php
require "Connection/koneksi.php";
$querypenginapan = mysqli_query($con, "SELECT * FROM hotel WHERE akomodasi='penginapan'");

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

    <section class="packages" id="hotel">
        <h1 class="heading">
            <span>L</span>
            <span>i</span>
            <span>s</span>
            <span>t</span>
            <span class="space"> </span>
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
            while ($data = mysqli_fetch_array($querypenginapan)) {
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
    </section>
    <div>
        <?php require("footer.php") ?>
        <script src=" js/index_active.js"></script>
    </div>

</body>

</html>