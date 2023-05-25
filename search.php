<?php
require "Connection/koneksi.php";

$keyword = $_GET['keyword'];
$query = mysqli_query($con, "SELECT * FROM hotel WHERE nama LIKE'%$keyword%' OR deskripsi LIKE '%$keyword%'");
$jumlah = mysqli_num_rows($query);
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


</head>

<body>
    <!-- Navbar Start-->
    <?php require('navbar_active.php') ?>

    <!-- Navbar End -->
    <section class="packages" id="hotel">
        <h1 class="heading">
            <span>S</span>
            <span>e</span>
            <span>a</span>
            <span>r</span>
            <span>c</span>
            <span>h</span>
        </h1>
        <div class="box-container">
            <?php
            if ($jumlah == 0) {
                ?>
                <div class="alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">Data yang anda Cari Sedang tidak tersedia</span>
                </div>
                <?php
            } else {
                while ($data = mysqli_fetch_array($query)) {
                    $jumlah = 1;
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
                    <?php
                    $jumlah++;
                }
            } ?>
        </div>
    </section>
    <?php require("footer.php") ?>
    <script src=" js/index_active.js"></script>

</body>

</html>