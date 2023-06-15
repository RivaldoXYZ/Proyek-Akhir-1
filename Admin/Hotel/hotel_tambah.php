<?php
require "../session.php";
require "../../Connection/koneksi.php";

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

<?php require "header.php" ?>

<body>
    <?php require("../nav.php") ?>
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
                    <label for="foto" class="mb-2 mt-2">Foto 1</label>
                    <input type="file" name="foto" id="foto" class="form-control">
                </div>
                <div>
                    <label for="foto1" class="mb-2 mt-2">Foto 2</label>
                    <input type="file" name="foto1" id="foto1" class="form-control">
                </div>
                <div>
                    <label for="foto2" class="mb-2 mt-2">Foto 3</label>
                    <input type="file" name="foto2" id="foto2" class="form-control">
                </div>
                <div>
                    <label for="kabupaten" class="mb-2 mt-2">Harga Terendah</label>
                    <input type="text" name="harga_terendah" id="harga_terendah" class="form-control"
                        pattern="\d+(\.\d{3})?">
                </div>
                <div>
                    <label for="kabupaten" class="mb-2 mt-2">Kabupaten</label>
                    <input type="text" name="kabupaten" id="kabupaten" class="form-control" pattern="\d+(\.\d{3})?">
                </div>
                <div>
                    <label for="deskripsi" class="mb-2 mt-2">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div>
                    <label for="akomodasi" class="mb-2 mt-2">Akomodasi</label>
                    <select name="akomodasi" id="akomodasi" class="form-control">
                        <option value="">---- Pilih Akomodasi ----</option>
                        <option value="hotel">Hotel</option>
                        <option value="penginapan">Penginapan</option>
                    </select>
                </div>
                <div>
                    <label for="fasilitas" class="mb-2 mt-2">Fasilitas</label>
                    <textarea name="fasilitas" id="fasilitas" cols="30" rows="5" class="form-control"></textarea>
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
            $kabupaten = htmlspecialchars($_POST['kabupaten']);
            $deskripsi = htmlspecialchars($_POST['deskripsi']);
            $akomodasi = htmlspecialchars($_POST['akomodasi']);
            $fasilitas = htmlspecialchars($_POST['fasilitas']);

            $target_dir = "../../img/image/";
            $nama_file = basename($_FILES["foto"]["name"]);
            $target_file = $target_dir . $nama_file;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $image_size = $_FILES["foto"]["size"];
            $random_name = generateRandomString(20);
            $name = $random_name . "." . $imageFileType;

            if ($nama_file != '') {
                if ($image_size > 5000000) {
                    ?>
                    <div class="alert alert-warning mt-3" role="alert">
                        File tidak boleh lebih dari 5000 Kb
                    </div>
                    <?php
                    exit; // Berhenti jika file terlalu besar
                } else {
                    if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png') {
                        ?>
                        <div class="alert alert-warning mt-3" role="alert">
                            Format gambar tidak sesuai
                        </div>
                        <?php
                        exit; // Berhenti jika format gambar tidak sesuai
                    } else {
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $target_dir . $name);
                    }
                }
            }
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

                $querytambah = mysqli_query($con, "INSERT INTO hotel(kategori_id, nama,  alamat, kordinat, foto, harga_terendah, kabupaten, deskripsi, akomodasi, fasilitas) VALUES ('$kategori', '$nama', '$alamat', '$kordinat', '$name', '$harga_terendah','$kabupaten', '$deskripsi', '$akomodasi', '$fasilitas')");
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
    <?php require "script.php"; ?>
</body>

</html>