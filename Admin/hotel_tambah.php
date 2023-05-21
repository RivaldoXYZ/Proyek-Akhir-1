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
    <?php require("nav.php") ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page"><a href="../Admin/"
                        class="no-decoration text-muted"><i class="fa-solid fa-house"></i> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../Admin/hotel.php"
                        class="no-decoration text-muted">Hotel</a></li>
                <li class="breadcrumb-item active" aria-current="page"> <a href="../Admin/hotel_tambah.php"
                        class="no-decoration text-muted">Tambah Hotel</a></li>
            </ol>
        </nav>
        <div class="text-center mb-4">
            <h3>Add New Hotels</h3>
            <p class="text-muted">Complete the form below to add a hotel</p>
        </div>
        <div class="my-5 col-12 col-md-6">
            <h3>+ Tambah Hotel</h3>
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for="nama" class="mb-2 mt-2">Nama Hotel/Penginapan</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Hotel/Penginapan"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="kategori" class="mb-2 mt-2"></label>Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="">---- Pilih Kategori ----</option>
                        <?php
                        while ($datakategori = mysqli_fetch_array($querykategory)) {
                            ?>
                            <option value="<?php echo $datakategori['id']; ?>"><?php echo $datakategori['nama']; ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="alamat" class="mb-2 mt-2">Alamat</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat Hotel/Penginapan"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="kordinat" class="mb-2 mt-2">Kordinat</label>
                    <input type="text" name="kordinat" id="kordinat" placeholder="Masukkan kordinat Hotel/Penginapan"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="foto" class="mb-2 mt-2">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="harga_tertinggi" class="mb-2 mt-2">Harga Terendah</label>
                    <input type="text" name="harga_terendah" id="harga_terendah" class="form-control">
                </div>
                <div>
                    <label for="harga_tertinggi" class="mb-2 mt-2">Harga Tertinggi</label>
                    <input type="text" name="harga_tertinggi" id="harga_tertinggi" class="form-control">
                </div>
                <div>
                    <label for="deskripsi" class="mb-2 mt-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpan_hotel">Simpan</button>
                </div>
            </form>
        </div>
        <?php
        if (isset($_POST['simpan_hotel'])) {
            $nama = htmlspecialchars($_POST['nama']);
            $kategori = htmlspecialchars($_POST['kategori']);
            $alamat = htmlspecialchars($_POST['alamat']);
            $kordinat = htmlspecialchars($_POST['kordinat']);
            $harga_terendah = htmlspecialchars($_POST['harga_terendah']);
            $harga_tertinggi = htmlspecialchars($_POST['harga_tertinggi']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);

            $target_dir = "../img/image/";
            $nama_file = basename($_FILES["foto"]["name"]);
            $target_file = $target_dir . $nama_file;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_size = $_FILES["foto"]["size"];
            $random_name = generateRandomString(20);
            $name = $random_name . "." . $imageFileType;


            if ($nama == '' || $kategori == '' || $alamat == '') {
                ?>
                <div class="alert alert-warning mt-3" role="alert">
                    Nama,Kategori, Kordinat, dan alamat wajib di isi
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

                $querytambah = mysqli_query($con, "INSERT INTO hotel(kategori_id, nama,  alamat, kordinat, foto, harga_terendah, harga_tertinggi, deskripsi) VALUES ('$kategori', '$nama', '$alamat', '$kordinat', '$name', '$harga_terendah','$harga_tertinggi', '$deskripsi')");
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
</body>

</html>