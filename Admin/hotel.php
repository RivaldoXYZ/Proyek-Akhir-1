<?php
require "session.php";
require "../Connection/koneksi.php";

$queryhotel = mysqli_query($con, "SELECT H.*, K.nama AS nama_kategori FROM hotel H JOIN kategori K ON H.kategori_id=K.id ");
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
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../Admin/hotel.php"
                        class="no-decoration text-muted">Hotel</a></li>
            </ol>
        </nav>
        <div class="my-5 col-12 col-md-6">
            <h3>+ Tambah Hotel</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="mb-2 mt-2">Nama Hotel</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama hotel" class="form-control"
                        autocomplete="off">
                </div>
                <div>
                    <label for="kategori" class="mb-2 mt-2"></label>Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">---- Pilih Kategori ----</option>
                        <?php
                        while ($datakategori = mysqli_fetch_array($querykategory)) {
                            ?>
                            <option value="<?php echo $datakategori['id']; ?>"><?php echo $datakategori['nama']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="kordinat" class="mb-2 mt-2">Kordinat</label>
                    <input type="text" name="kordinat" id="kordinat" placeholder="Masukkan Kordinat Hotel"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="lokasi" class="mb-2 mt-2">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" placeholder="Masukkan Lokasi Hotel"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="foto" class="mb-2 mt-2">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail" class="mb-2 mt-2">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_hotel">Simpan</button>
                </div>
            </form>
            <?php
            if (isset($_POST['simpan_hotel'])) {
                $nama = htmlspecialchars($_POST['nama']);
                $kategori = htmlspecialchars($_POST['kategori']);
                $kordinat = htmlspecialchars($_POST['kordinat']);
                $lokasi = htmlspecialchars($_POST['lokasi']);
                $detail = htmlspecialchars($_POST['detail']);

                $target_dir = "../img/image/";
                $nama_file = basename($_FILES["foto"]["name"]);
                $target_file = $target_dir . $nama_file;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $image_size = $_FILES["foto"]["size"];
                $random_name = generateRandomString(20);
                $name = $random_name . "." . $imageFileType;


                if ($nama == '' || $kategori == '' || $lokasi == '') {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        Nama,Kategori, Kordinat, dan Lokasi wajib di isi
                    </div>
                    <?php
                } else {
                    if ($nama_file != '') {
                        if ($image_size > 500000) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File Tidak boleh lebih dari 500 Kb
                            </div>
                            <?php
                        } else {
                            if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png') {
                                ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Format Gambar tidak sesuai
                                </div>
                                <?php
                            } else {
                                move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $name);
                            }
                        }
                    }

                    $querytambah = mysqli_query($con, "INSERT INTO hotel(kategori_id, nama,  lokasi, kordinat, foto, detail) VALUES ('$kategori', '$nama', '$lokasi', '$kordinat', '$name', '$detail')");
                    if ($querytambah) {
                        ?>
                        <div class="alert alert-success mt-3" role="alert">
                            Data Hotel Berhasil disimpan
                        </div>

                        <meta http-equiv="refresh" content="0; url=hotel.php">
                        <?php
                    } else {
                        echo mysqli_error($con);
                    }
                }
            } ?>
        </div>
        <div class="mt3">
            <h2>List hotel </h2>
            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Nama </th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Kordinat</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlah == 0) {
                            ?>
                            <tr>
                                <td colspan=3 class="text-center">Data Hotel Tidak Tersedia</td>
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
                                        <?php echo $data['lokasi']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['kordinat']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data['foto']; ?>
                                    </td>
                                    <td>
                                        <a href="hotel-detail.php? id=<?php echo $data['id'] ?>" class="btn btn-info"><i
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
    </div>
</body>

</html>