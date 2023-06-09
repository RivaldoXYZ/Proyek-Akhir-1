<?php
require "../session.php";
require "../../Connection/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<?php require "header.php" ?>

<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <h2>Detail Kategori</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div><label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama'] ?>"
                        class="form-control">
                </div>
                <div>
                    <label for="skor" class="mb-2 mt-2">Skor</label>
                    <input type="number" name="skor" id="skor" value="<?php echo $data['skor'] ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="edit_kategori">Edit</button>
                    <button class="btn btn-danger" type="submit" name="hapus_kategori">Hapus</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit_kategori'])) {
                $kategori = htmlspecialchars($_POST['kategori']);
                if ($data['nama'] == $kategori) {
                    ?>
                    <meta http-equiv="refresh" content="0; url=kategori.php">
                    <?php
                } else {
                    $queryCheck = mysqli_query($con, "SELECT nama FROM Kategori WHERE nama ='$kategori'");
                    $jumlahCheck = mysqli_num_rows($queryCheck);

                    if ($jumlahCheck > 0) {
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Kategori Sudah ada
                        </div>
                        <?php
                    } else {
                        $edit = mysqli_query($con, "UPDATE kategori SET nama ='$kategori' WHERE id = '$id'");
                        if ($edit) {
                            ?>
                            <div class="alert alert-success mt-3" role="alert">
                                Kategori Berhasil diupdate
                            </div>
                            <meta http-equiv="refresh" content="0; url=kategori.php">
                            <?php
                        } else {
                            echo mysqli_error($con);
                        }

                    }
                }
            }
            if (isset($_POST['hapus_kategori'])) {
                $querycek = mysqli_query($con, "SELECT * FROM hotel WHERE kategori_id = '$id' ");
                $count = mysqli_num_rows($querycek);
                if ($count > 0) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Tidak Bisa Dihapus karena sudah digunakan oleh Hotel/Penginapan
                    </div>
                    <?php
                    die();
                }

                $queryDelete = mysqli_query($con, "DELETE FROM kategori WHERE id='$id'");
                if ($queryDelete) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Kategori Berhasil diHapus
                        <meta http-equiv="refresh" content="0; url=kategori.php">
                    </div>
                    <?php

                } else {
                    echo mysqli_error($con);
                }
            } ?>
        </div>
    </div>
    <?php require "script.php" ?>
</body>

</html>