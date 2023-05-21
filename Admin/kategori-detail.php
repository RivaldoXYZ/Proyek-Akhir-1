<?php
require "session.php";
require "../Connection/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM kategori WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Detail</title>

    <script src="https://kit.fontawesome.com/636810249d.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link me-4" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="hotel.php">Hotel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-4" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Detail Kategori</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post">
                <div><label for="kategori">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="<?php echo $data['nama'] ?>"
                        class="form-control">
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
</body>

</html>