<?php
require "session.php";
require "../Connection/koneksi.php";

$querykategory = mysqli_query($con, "SELECT * FROM kategori");
$jumlah = mysqli_num_rows($querykategory);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Admin</title>

    <script src="https://kit.fontawesome.com/636810249d.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php require("nav.php") ?>
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
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_kategori">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_kategori'])) {
                $kategori = htmlspecialchars($_POST['kategori']);
                $queryCheck = mysqli_query($con, "SELECT nama FROM kategori WHERE nama ='$kategori'");
                $jumlahCheck = mysqli_num_rows($queryCheck);

                if ($jumlahCheck > 0) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Kategori Sudah ada
                    </div>
                    <?php
                } else {
                    $simpan = mysqli_query($con, "INSERT INTO kategori (nama) VALUES ('$kategori') ");
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
</body>

</html>