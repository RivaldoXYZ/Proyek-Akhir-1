<?php
require "../session.php";
require "../../Connection/koneksi.php";

$querykamar = mysqli_query($con, "SELECT KMR.*, H.nama  FROM kamar KMR JOIN hotel H ON KMR.id_hotel=H.id ");
$jumlah = mysqli_num_rows($querykamar);

$queryhotel = mysqli_query($con, "SELECT * FROM hotel");
$jumlahhotel = mysqli_num_rows($queryhotel);

?>
<!DOCTYPE html>
<html lang="en">

<?php require "header.php" ?>

<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../../Admin/Kamar/kamar.php"
                        class="no-decoration text-muted">Kamar</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../../Admin/Kamar/kamar_tambah.php"
                        class="no-decoration text-muted">Tambah Kamar</a></li>
            </ol>
        </nav>
        <div class="text-center mb-4">
            <h3>Add New Room</h3>
            <p class="text-muted">Complete the form below to add a room</p>
        </div>
        <div class="my-5 col-12 col-md-6">
            <h3>+ Tambah Hotel</h3>
            <form action="" method="post">
                <div>
                    <label for="tipe_kamar" class="mb-2 mt-2">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" placeholder="Masukkan Tipe Kamar"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="hotel" class="mb-2 mt-3"></label>Hotel</label>
                    <select name="hotel" id="hotel" class="form-control">
                        <option value="">---- Pilih hotel ----</option>
                        <?php
                        while ($datahotel = mysqli_fetch_array($queryhotel)) {
                            ?>
                            <option value="<?php echo $datahotel['id']; ?>"><?php echo $datahotel['nama']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="fasilitas_kamar" class="mb-2 mt-2">Fasilitas Kamar</label>
                    <textarea name="fasilitas_kamar" id="fasilitas_kamar" cols="30" rows="10"
                        class="form-control"></textarea>
                </div>
                <div>
                    <label for="harga_kamar" class="mb-2 mt-2">Harga Kamar</label>
                    <input type="number" name="harga_kamar" id="harga_kamar" placeholder="Masukkan Harga Kamar"
                        class="form-control" autocomplete="off">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kamar">Simpan</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['simpan_kamar'])) {
            $tipe_kamar = htmlspecialchars($_POST['tipe_kamar']);
            $hotel = htmlspecialchars($_POST['hotel']);
            $fasilitas_kamar = htmlspecialchars($_POST['fasilitas_kamar']);
            $harga_kamar = htmlspecialchars($_POST['harga_kamar']);

            if ($tipe_kamar == '' || $hotel == '' || $fasilitas_kamar == '') {
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Tipe Kamar,Hotel, harga_kamar, dan Fasilitas wajib di isi
                </div>
                <?php
            } else {
                $querytambah = mysqli_query($con, "INSERT INTO kamar(id_hotel, tipe_kamar,  fasilitas_kamar, harga_kamar) VALUES ('$hotel', '$tipe_kamar', '$fasilitas_kamar', '$harga_kamar')");
                if ($querytambah) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Data Kamar Berhasil disimpan
                    </div>

                    <meta http-equiv="refresh" content="0; url=kamar.php">
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }
        } ?>
    </div>
    <?php require "script.php" ?>

</body>

</html>