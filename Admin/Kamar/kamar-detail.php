<?php
require "../session.php";
require "../../Connection/koneksi.php";

$querykamar = mysqli_query($con, "SELECT KMR.*, H.nama AS nama  FROM kamar KMR JOIN hotel H ON KMR.id_hotel=H.id ");
$jumlah = mysqli_num_rows($querykamar);
$data = mysqli_fetch_array($querykamar);
$id = $_GET['id'];

$queryhotel = mysqli_query($con, "SELECT * FROM hotel  WHERE id!='$data[id_hotel]'");
$jumlahhotel = mysqli_num_rows($queryhotel);

?>
<!DOCTYPE html>
<html lang="en">

<?php require "header.php" ?>


<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <h2>Detail kamar</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div>
                    <label for="tipe_kamar" class="mb-2 mt-2">Tipe Kamar</label>
                    <input type="text" name="tipe_kamar" id="tipe_kamar" placeholder="Masukkan Tipe Kamar"
                        class="form-control" value="<?php echo $data['tipe_kamar'] ?>">
                </div>
                <div>
                    <label for="hotel" class="mb-2 mt-2"></label>Hotel</label>
                    <select name="hotel" id="hotel" class="form-control">
                        <option value="<?php echo $data['id_hotel']; ?>"><?php echo $data['nama']; ?>
                        </option>
                        <?php
                        while ($datahotel = mysqli_fetch_array($queryhotel)) {
                            ?>
                            <option value="<?php echo $datahotel['id']; ?>"><?php echo $datahotel['nama']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="fasilitas_kamar" class="mb-2 mt-2">Deskripsi</label>
                    <textarea name="fasilitas_kamar" id="fasilitas_kamar" cols="30" rows="10" class="form-control">
                        <?php echo $data['fasilitas_kamar']; ?>
                                </textarea>
                </div>
                <div>
                    <label for="harga_kamar" class="mb-2 mt-2">Harga Kamar</label>
                    <input type="number" name="harga_kamar" id="harga_kamar" value="<?php echo $data['harga_kamar'] ?>">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="edit_kamar">Edit</button>
                    <button class="btn btn-danger" type="submit" name="hapus_kamar">Hapus</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit_kamar'])) {
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
                    $queryUpdate = mysqli_query($con, "UPDATE kamar SET id_hotel ='$hotel',  tipe_kamar='$tipe_kamar', fasilitas_kamar='$fasilitas_kamar',harga_kamar='$harga_kamar'");
                    if ($queryUpdate) {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Data Hotel Berhasil diupdate
                        </div>
                        <meta http-equiv="refresh" content="0; url=kamar.php">
                        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            }
            if (isset($_POST['hapus_kamar'])) {
                $queryDelete = mysqli_query($con, "DELETE FROM kamar WHERE id_kamar='$id'");
                if ($queryDelete) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Hotel Berhasil diHapus
                        <meta http-equiv="refresh" content="0; url=kamar.php">
                    </div>
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }
            ?>
        </div>
    </div>
    <?php require "script.php" ?>
</body>

</html>