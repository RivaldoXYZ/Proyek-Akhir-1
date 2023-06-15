<?php
require "Connection/koneksi.php";

// Konfigurasi pagination
$limit = 8; // Jumlah item per halaman
$page = isset($_GET['page']) ? $_GET['page'] : 1; // Halaman saat ini

$starFilter = isset($_GET['star-filter']) ? $_GET['star-filter'] : 'all'; // Bintang yang dipilih pada filter

// Mengatur kondisi filter bintang pada query
$starCondition = '';
if ($starFilter !== 'all') {
    $starCondition = " AND K.skor = $starFilter";
}

// Menghitung jumlah total data setelah filter
$queryCount = mysqli_query($con, "SELECT COUNT(*) AS total FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.akomodasi='hotel' $starCondition");
$totalData = mysqli_fetch_assoc($queryCount)['total'];
$totalPages = ceil($totalData / $limit); // Jumlah halaman

// Mengatur halaman saat ini agar tidak melebihi jumlah halaman yang tersedia
if ($page > $totalPages) {
    $page = $totalPages;
}

// Mengatur batas data pada query
$offset = ($page - 1) * $limit;
if ($offset < 0) {
    $offset = 0;
}

$queryhotel = mysqli_query($con, "SELECT *, H.nama AS nama_hotel, H.id AS id_hotel FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.akomodasi='hotel' $starCondition ORDER BY H.nama LIMIT $offset, $limit");
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
        <div class="tittle">
            <h1 class="heading">
                <span>L</span>
                <span>i</span>
                <span>s</span>
                <span>t</span>
                <span class="space"> </span>
                <span>H</span>
                <span>o</span>
                <span>t</span>
                <span>e</span>
                <span>l</span>
            </h1>
        </div>
        <div class="filter">
            <label for="star-filter">Filter by Star:</label>
            <select id="star-filter" name="star-filter">
                <option value="all">All</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        </div>
        <div class="box-container">
            <?php
            while ($data = mysqli_fetch_array($queryhotel)) {
                ?>
                <div class="box">
                    <img decoding="async" src="img/image/<?php echo $data['foto'] ?>" alt="">
                    <div class="content">
                        <p class="location"><i class="fas fa-map-marker-alt"></i>
                            <?php echo $data['kabupaten'] ?>
                        </p>
                        <h3>
                            <?php echo $data['nama_hotel'] ?>
                        </h3>
                        <div class="stars">
                            <?php
                            $id_hotel = $data['id_hotel'];
                            $querystar = mysqli_query($con, "SELECT H.nama, K.nama AS nama_kategori, K.skor FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id = '$id_hotel'");
                            $star = mysqli_fetch_array($querystar);
                            $rating = $star['skor'];
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Bintang penuh
                                } else {
                                    // echo '<i class="far fa-star"></i>'; // Bintang kosong
                                }
                            }
                            ?>
                        </div>
                        <div class="price">
                            <p>IDR
                                <?php echo $data['harga_terendah'] ?>
                            </p>
                        </div>
                        <a href="detail.php?id=<?php echo $data['id_hotel'] ?>" class="btn">Detail</a>
                    </div>
                </div>

            <?php } ?>
        </div>

    </section>
    <!-- Pagination -->
    <div class="pagination">
        <?php
        if ($totalPages > 1) {
            // Tautan "previous"
            if ($page > 1) {
                echo '<a href="?page=' . ($page - 1) . '&star-filter=' . $starFilter . '"><i class="fas fa-chevron-left"></i></a>';
            }

            // Tautan halaman
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a href="?page=' . $i . '&star-filter=' . $starFilter . '"';
                if ($i == $page) {
                    echo ' class="active"';
                }
                echo '>' . $i . '</a>';
            }

            // Tautan "next"
            if ($page < $totalPages) {
                echo '<a href="?page=' . ($page + 1) . '&star-filter=' . $starFilter . '"><i class="fas fa-chevron-right"></i></a>';
            }
        }
        ?>
    </div>

    <div>
        <?php require("footer.php") ?>
    </div>
    <script src=" js/index_active.js"></script>
</body>

</html>