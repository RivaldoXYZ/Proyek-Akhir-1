<?php
require "../session.php";
require "../../Connection/koneksi.php";

$querykategory = mysqli_query($con, "SELECT * FROM kategori");
$jumlah = mysqli_num_rows($querykategory);

?>
<!DOCTYPE html>
<html lang="en">


<?php require "header.php" ?>

<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../Admin/kategori.php"
                        class="no-decoration text-muted">Kategori</a></li>
            </ol>
        </nav>
        <div class="text-center m-3">
            <h3>List Kategori</h3>
            <p class="text-muted">Berikut adalah daftar list kategori yang ada pada database anda</p>
        </div>
        <div class="mt3">
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama </th>
                            <th>Skor</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlah == 0) {
                            ?>
                            <tr>
                                <td colspan=3 class="text-center">Data Kategori Tidak Tersedia</td>
                            </tr>
                            <?php
                        } else {
                            $jumlah = 1;
                            while ($data = mysqli_fetch_array($querykategory)) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $jumlah; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['nama']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['skor']; ?>
                                    </td>
                                    <td>
                                        <a href="kategori-detail.php?id=<?php echo $data['id'] ?>" class="btn btn-info"><i
                                                class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                $jumlah++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="my-5 col-12 col-md-6">
            <h3>+ Tambah Kategori</h3>
            <form action="" method="post">
                <div>
                    <label for="kategori" class="mb-2 mt-2">Kategori</label>
                    <input type="text" name="kategori" id="kategori" placeholder="Masukkan Nama Kategori"
                        class="form-control">
                </div>
                <div>
                    <label for="skor" class="mb-2 mt-2">Skor</label>
                    <input type="number" name="skor" id="skor" placeholder="Masukkan Skor" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_kategori'])) {
                $kategori = htmlspecialchars($_POST['kategori']);
                $skor = htmlspecialchars($_POST['skor']);
                $queryCheck = mysqli_query($con, "SELECT nama FROM kategori WHERE nama ='$kategori'");
                $jumlahCheck = mysqli_num_rows($queryCheck);

                if ($jumlahCheck > 0) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Sudah ada
                    </div>
                    <?php
                } else {
                    $simpan = mysqli_query($con, "INSERT INTO kategori (nama, skor) VALUES ('$kategori', '$skor') ");
                    if ($simpan) {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Kategori Berhasil disimpan
                        </div>

                        <meta http-equiv="refresh" content="0; url=kategori.php">
                        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            } ?>
        </div>
    </div>
    <?php require "script.php" ?>
</body>

</html>