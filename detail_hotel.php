<?php
require "Connection/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT * FROM hotel WHERE id = '$id'");
$querycomment = mysqli_query($con, "SELECT * FROM diskusi WHERE id_hotel = '$id'");
$jumlah = mysqli_num_rows($query);
$data = mysqli_fetch_array($query);
$tanggalSekarang = date('Y-m-d');

$querystar = mysqli_query($con, "SELECT H.nama, K.nama AS nama_kategori, K.skor FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id = '$id'");
$star = mysqli_fetch_array($querystar);

$querykamar = mysqli_query($con, "SELECT * FROM kamar WHERE id_hotel = '$id'");
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
                    <?php
                    $rating = $star['skor'];
                    // Ambil rating dari data ulasan
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $rating) {
                            echo '<i class="fas fa-star"></i>'; // Bintang penuh
                        } else {
                            echo '<i class="far fa-star"></i>'; // Bintang kosong
                        }
                    }
                    ?>
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
        <div class="coment">
            <h1 class="heading">
                <h1>Halaman Q&A</h1>
            </h1>
            <!-- <form action="" method="post">
                <label for="rating">Berikan Rating untuk tempat ini :
                    <div class="rating">
                        <input type="radio" id="star1" name="rating" value="1" onclick="setRating(1)" />
                        <label for="star1"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2" onclick="setRating(2)" />
                        <label for="star2"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3" onclick="setRating(3)" />
                        <label for="star3"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4" onclick="setRating(4)" />
                        <label for="star4"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star5" name="rating" value="5" onclick="setRating(5)" />
                        <label for="star5"><i class="fas fa-star"></i></label>
                    </div>
                </label>
                <script>
                    let selectedRating = 0;

                    function setRating(rating) {
                        let stars = document.getElementsByClassName("rating")[0].getElementsByTagName("label");

                        if (rating === selectedRating) {
                            // Jika bintang yang sudah terisi diklik lagi, kosongkan rating
                            selectedRating = 0;
                        } else {
                            selectedRating = rating;
                        }

                        for (let i = 0; i < stars.length; i++) {
                            if (i < selectedRating) {
                                stars[i].classList.add("filled");
                            } else {
                                stars[i].classList.remove("filled");
                            }
                        }
                    }
                </script>

                <style>
                    .rating {
                        display: flex;
                        align-items: center;
                    }

                    .rating input[type="radio"] {
                        display: none;
                    }

                    .rating label {
                        color: #999;
                        cursor: pointer;
                        transition: color 0.2s;
                    }

                    .rating label.filled {
                        color: #FFD700;
                    }

                    .rating i {
                        font-size: 2rem;
                        margin-top: 1rem;
                    }
                </style> -->
            </form>
            <div class="comment-section">
                <h3>Komentar</h3>
                <?php while ($comment = mysqli_fetch_array($querycomment)) {
                    ?>
                    <div class="comments">
                        <div class="comment">
                            <span class="comment-user"><i class="fa-solid fa-user fa-xl"></i>
                                &nbsp;
                                <?php echo $comment['nama'] ?>
                            </span>
                            <br>
                            <span class="comment-content">
                                <?php echo $comment['pesan'] ?>
                            </span>
                        </div>
                        <!-- Tambahkan komentar tambahan di sini -->
                    </div>
                    <?php
                } ?>
            </div>

            <?php
            // Mengecek apakah ada parameter id yang dikirimkan melalui URL
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                ?>
                <form class="custom-form" action="proses.php" method="post">
                    <h3>Form Reviews</h3>
                    <br>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="hidden" name="tanggal" value="<?php echo $tanggalSekarang; ?>">

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>
                    <br>
                    <br>
                    <label for="pesan">Punya Pertanyaan ?</label>
                    <textarea id="pesan" name="pesan" required></textarea>
                    <button type="submit" name="submitpesan">Kirim Pesan</button>
                </form>
                <?php
            } else {
                echo "Hotel tidak ditemukan.";
            }
            ?>
        </div>
    </div>
    <div>
        <?php require("footer.php") ?>
        <script src=" js/index_active.js"></script>
    </div>

</body>

</html>