<?php
require "../session.php";
require "../../Connection/koneksi.php";

$queryhotel = mysqli_query($con, "SELECT H.*, K.nama AS nama_kategori FROM hotel H JOIN kategori K ON H.kategori_id=K.id ORDER BY akomodasi");
$jumlah = mysqli_num_rows($queryhotel);

$querykategory = mysqli_query($con, "SELECT * FROM kategori");
$jumlahkategori = mysqli_num_rows($querykategory);

function generateRandomString($length = 10)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[random_int(0, $charactersLength - 1)];
    }
    return $randomString;
}
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
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Summernote CSS - CDN Link -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->



</head>

<body>
    <?php require("../nav.php") ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../../Admin/Hotel/hotel.php"
                        class="no-decoration text-muted">Hotel atau Penginapan</a></li>
            </ol>
        </nav>
        <div class="text-center m-3">
            <h2>List Hotel/Penginapan</h2>
            <p class="text-muted">Berikut adalah daftar list Hotel/Penginapan yang ada pada database anda</p>
        </div>
        <div class="table-responsive mt-3">
            <table class=" table">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama </th>
                        <th>Kategori</th>
                        <th>Alamat</th>
                        <th>Harga Terendah</th>
                        <th>Kabupaten</th>
                        <th>Akomodasi</th>
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
                            <td></td>
                            <td></td>
                            <td colspan=3 class="text-center" colspan="10">Data Hotel Tidak Tersedia</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <?php
                    } else {
                        $jumlah = 1;
                        while ($data = mysqli_fetch_array($queryhotel)) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $jumlah; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama']; ?>
                                </td>
                                <td>
                                    <?php echo $data['nama_kategori']; ?>
                                </td>
                                <td>
                                    <?php echo $data['alamat']; ?>
                                </td>
                                <td>
                                    <?php echo $data['harga_terendah']; ?>
                                </td>
                                <td>
                                    <?php echo $data['kabupaten']; ?>
                                </td>
                                <td>
                                    <?php echo $data['akomodasi']; ?>
                                </td>
                                <td>
                                    <a href="hotel-detail.php?id=<?php echo $data['id'] ?>" class="btn btn-info"><i
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
            <a href="hotel_tambah.php" class="btn btn-dark mb-3">Add New</a>
        </div>
    </div>
    <?php require "script.php"; ?>
</body>

</html>