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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Admin</title>

    <script src="https://kit.fontawesome.com/636810249d.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>

<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../Kamar/kamar.php"
                        class="no-decoration text-muted">Kamar</a></li>
            </ol>
        </nav>
        <div class="text-center m-3">
            <h2>List Kamar</h2>
            <p class="text-muted">Berikut adalah daftar list Kamar yang saat ini Tersedia</p>
        </div>
        <div class="table-responsive mt-3">
            <table class=" table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Tipe Kamar</th>
                        <th>Hotel</th>
                        <th>Fasilitas Kamar</th>
                        <th>Harga Kamar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($jumlah == 0) {
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td colspan=3 class="text-center" colspan="10">Data Kamar Tidak Tersedia</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($querykamar)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $jumlah; ?>
                                </td>
                                <td>
                                    <?php echo $data['tipe_kamar']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $data['fasilitas_kamar']; ?>
                                </td>
                                <td>
                                    <?php echo $data['harga_kamar']; ?>
                                </td>
                                <td>
                                    <a href="kamar-detail.php?id=<?php echo $data['id_kamar'] ?>" class="btn btn-info"><i
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
            <a href="kamar_tambah.php" class="btn btn-dark mb-3">Add New</a>
        </div>
    </div>
    <?php require "script.php" ?>
</body>

</html>