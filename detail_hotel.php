<?php
require "Connection/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM hotel WHERE id = '$id'");
$jumlah = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
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
    <div>

    </div>
    <div class="detail" id="detail">
        <div class="row">
            <div class="detail-img">
                <img src="img/image/<?php echo $data['foto']; ?>" alt="">
            </div>
            <div class="content">
                <h2>
                    <?php echo $data['nama'] ?>
                </h2>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
                </div>
                <p>
                    Alamat :
                    <?php echo $data['alamat']; ?>
                </p>
                <p>
                    Koordinat :
                    <?php echo $data['kordinat']; ?>
                </p>

                <p>
                    Harga :
                    Rp
                    <?php echo $data['harga_terendah']; ?> -
                    Rp
                    <?php echo $data['harga_tertinggi']; ?>
                </p>
                <p>
                    Deskripsi : <br>
                    <?php echo $data['deskripsi']; ?>
                </p>
            </div>
        </div>
        <div class="box">
            <h1>Maps</h1>
            <iframe class="maps" src=" <?php echo $data['maps']; ?>" frameborder="0"></iframe>
        </div>
    </div>
    <div>
        <?php require("footer.php") ?>
        <script src=" js/index_active.js"></script>
    </div>

</body>

</html>