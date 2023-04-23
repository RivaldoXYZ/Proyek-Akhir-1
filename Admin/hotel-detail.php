<?php
require "session.php";
require "../Connection/koneksi.php";

$id = $_GET['id'];

$queryhotel = mysqli_query($con, "SELECT H.*, K.nama AS nama_kategori FROM hotel H JOIN kategori K ON H.kategori_id=K.id WHERE H.id ='$id' ");
$jumlah = mysqli_num_rows($queryhotel);
$data = mysqli_fetch_array($queryhotel);

$querykategori = mysqli_query($con, "SELECT * FROM kategori WHERE id!='$data[kategori_id]'");
$jumlahkategori = mysqli_num_rows($querykategori);
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
    <title>Hotel Detail</title>

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
        <h2>Detail Hotel</h2>
        <div class="col-12 col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div>
                    <label for=" nama">Hotel</label>
                    <input type="text" name="nama" id="nama" value="<?php echo $data['nama'] ?>" class="form-control">
                </div>
                <div>
                    <label for="kategori" class="mb-2 mt-2"></label>Kategori</label>
                    <select name="kategori" id="kategori" class="form-control" va>
                        <option value="<?php echo $data['kategori_id']; ?>"><?php echo $data['nama_kategori']; ?>
                        </option>
                        <?php
                        while ($datakategori = mysqli_fetch_array($querykategori)) {
                            ?>
                            <option value="<?php echo $datakategori['id']; ?>"><?php echo $datakategori['nama']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="kordinat" class="mb-2 mt-2">Kordinat</label>
                    <input type="text" name="kordinat" id="kordinat" value="<?php echo $data['kordinat']; ?>"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="lokasi" class="mb-2 mt-2">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" value="<?php echo $data['lokasi']; ?>"
                        class="form-control" autocomplete="off">
                </div>
                <div>
                    <label for="currentFoto">Foto Hotel Sekarang</label>
                    <img src="../img/image/<?php echo $data['foto']; ?>" alt="" width="300rem">
                </div>
                <div>
                    <label for="foto" class="mb-2 mt-2">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="detail" class="mb-2 mt-2">Detail</label>
                    <textarea name="detail" id="detail" cols="30" rows="10" class="form-control">
                        <?php echo $data['detail']; ?>
                    </textarea>
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="edit_hotel">Edit</button>
                    <button class="btn btn-danger" type="submit" name="hapus_hotel">Hapus</button>
                </div>
            </form>
            <?php
            if (isset($_POST['edit_hotel'])) {
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
                    $queryUpdate = mysqli_query($con, "UPDATE hotel SET kategori_id ='$kategori', nama='$nama', lokasi='$lokasi', kordinat='$kordinat', detail='$detail' WHERE id='$id'");

                    if ($nama_file != '') {
                        if ($image_size > 500000000) {
                            ?>
                            <div class="alert alert-warning mt-3" role="alert">
                                File Tidak boleh lebih dari 50 Mb
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
                                $queryUpdate = mysqli_query($con, "UPDATE hotel SET foto='$name' WHERE id='$id'");
                                if ($queryUpdate) {
                                    ?>
                                    <div class="alert alert-success mt-3" role="alert">
                                        Data Hotel Berhasil diupdate
                                    </div>
                                    <meta http-equiv="refresh" content="0; url=hotel.php">
                                    <?php
                                } else {
                                    echo mysqli_error($con);
                                }
                            }
                        }
                    }
                }
            }
            if (isset($_POST['hapus_hotel'])) {
                $queryDelete = mysqli_query($con, "DELETE FROM hotel WHERE id='$id'");
                if ($queryDelete) {
                    ?>
                    <div class="alert alert-success mt-3" role="alert">
                        Hotel Berhasil diHapus
                        <meta http-equiv="refresh" content="0; url=hotel.php">
                    </div>
                    <?php
                } else {
                    echo mysqli_error($con);
                }
            }

            ?>
        </div>
    </div>
</body>

</html>