<?php
require "Connection/koneksi.php";
if (isset($_POST['submitpesan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $tanggalSekarang = $_POST['tanggal'];
    $queryrating = "INSERT INTO diskusi(id_hotel, nama, pesan, tanggal) VALUES ('$id', '$nama', '$pesan', '$tanggalSekarang')";
    $query = "INSERT INTO diskusi(id_hotel, nama, pesan, tanggal) VALUES ('$id', '$nama', '$pesan', '$tanggalSekarang')";
    if (mysqli_query($con, $query)) {
        ?>
        <div class="alert alert-success mt-3" role="alert">
            Komentar Terkirim
            <meta http-equiv="refresh" content="0; url=detail_hotel.php?id=<?php echo $id = $_POST['id']; ?>">
        </div>
        <?php
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
} ?>


// Ambil data rating dari input
$rating = $_POST['rating'];

// Simpan ulasan ke dalam tabel ulasan
$query = "INSERT INTO ulasan (id_hotel, skor_ulasan, isi_ulasan) VALUES ('$id_hotel', '$rating', '$isi_ulasan')";
mysqli_query($koneksi, $query);