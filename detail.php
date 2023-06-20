<?php
require "Connection/koneksi.php";
$id = $_GET['id'];
$query = mysqli_query($con, "SELECT* FROM hotel WHERE id = '$id'");

$querycomment = mysqli_query($con, "SELECT * FROM diskusi WHERE id_hotel = '$id'");
$jumlah = mysqli_num_rows($query);

$data = mysqli_fetch_array($query);

$tanggalSekarang = date('Y-m-d');

$querystar = mysqli_query($con, "SELECT H.nama, K.nama AS nama_kategori, K.skor FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id = '$id'");
$star = mysqli_fetch_array($querystar);
$count = mysqli_num_rows($querycomment);
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
    <div class="detail" id="detail">
        <div class="rows">
            <div class="image-grid">
                <img class="image-grid-col-2 image-grid-row-2" src="img/image/<?php echo $data['foto']; ?>" alt="">
                <img class="image-grid-col-2" src="img/image/<?php echo $data['foto1']; ?>" alt="">
                <img class="image-grid-col-2" src="img/image/<?php echo $data['foto2']; ?>" alt="">
            </div>
            <div class="nav-section">
                <a href="#info">Info Umum</a>
                <a href="#fasilitas">Fasilitas dan Deskripsi</a>
                <a href="#maps">Maps</a>
                <a href="#form">QnA</a>
            </div>
            <section id="info">
                <div class="content">
                    <div class="row">
                        <div class="stars">
                            <?php
                            $rating = $star['skor'];
                            // Ambil rating dari data ulasan
                            for ($i = 1; $i <= 5; $i++) {
                                if ($i <= $rating) {
                                    echo '<i class="fas fa-star"></i>'; // Bintang penuh
                                } else {
                                    // echo '<i class="far fa-star"></i>'; // Bintang kosong
                                }
                            }
                            ?>
                        </div>
                        <div class="nama">
                            <h2>
                                <?php echo $data['nama'] ?>
                            </h2>
                            <div class="price">
                                Mulai Dari
                                <p>
                                    IDR
                                    <?php echo $data['harga_terendah'] ?>
                                </p>
                                /Kamar/Malam
                            </div>
                        </div>
                        <p class="alamat">
                            Alamat :
                            <?php echo $data['alamat']; ?>
                        </p>
                    </div>
                </div>
            </section>
            <section id="fasilitas">
                <p class="data-fasility-tittle">Fasilitas Yang Tersedia : <br></p>
                <div class="data-fasility">
                    <?php
                    $fasility = explode("-", $data['fasilitas']);
                    foreach ($fasility as $key => $listfasilitas) {
                        if ($key > 0) { // Tambahkan kondisi untuk melewati indeks 0
                            ?>
                            <div>
                                <i class="fa-solid fa-circle-check"></i>
                                <?php echo $listfasilitas; ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="deskripsi">
                    <p class="data-fasility-tittle">Deskripsi :</p>
                    <p class="det">
                        <?php
                        $decodedText = html_entity_decode($data['deskripsi']);
                        echo $decodedText; ?>
                    </p>
                </div>
            </section>
        </div>
        <div class="rows">
            <section id="maps">
                <div class="box-maps">
                    <h1>Maps</h1>
                    <iframe class="maps"
                        src="https://maps.google.com/maps?q=<?php echo $data['kordinat'] ?> &t=&z=15&ie=UTF8&iwloc=&output=embed"></iframe>
                </div>
            </section>
        </div>
        <div class="rows">
            <section id="form">
                <div class="coment">
                    <h1 class="heading">
                        <h1>Form Q&A</h1>
                    </h1>
                    </form>

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
                    }
                    ?>
                    <div class="comment-section">
                        <div>
                            <h3>All Komentar</h3>
                        </div>
                        <div class="count">
                            <?php
                            if ($count > 0) {
                                ?>
                                <div id="comment-count">
                                    <span id="count-number">
                                        <?php echo $count; ?>
                                    </span> Comment(s)
                                </div>
                                <?php
                            } ?>
                        </div>
                        <?php while ($comment = mysqli_fetch_array($querycomment)) {
                            ?>
                            <div class="comments">
                                <div class="comment">
                                    <div class="user">
                                        <span class="comment-user"><i class="fa-solid fa-user fa-xl"></i>
                                            &nbsp;
                                            <?php echo $comment['nama'] ?>
                                        </span>
                                        <p>
                                            <?php echo $comment['tanggal'] ?>
                                        </p>
                                    </div>
                                    <span class="comment-content">
                                        <?php echo $comment['pesan'] ?>
                                    </span>
                                </div>
                            </div>
                            <?php
                        } ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div>
        <?php require("footer.php") ?>
        <script src=" js/index_active.js"></script>
    </div>


</body>

</html>