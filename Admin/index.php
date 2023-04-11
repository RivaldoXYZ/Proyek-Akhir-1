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
    <title>Home Admin</title>

    <script src="https://kit.fontawesome.com/636810249d.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link me-4" aria-current="page" href="index.php">Home</a>
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
                <li class="breadcrumb-item active" aria-current="page"><i class="fa-solid fa-house"></i> Home</li>
            </ol>
        </nav>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4  col-md-6 col-12">
                <div class="summary-kategory p-3">
                    <div class="row">
                        <div class="col-6 " >
                            <i class="fa-solid fa-bars fa-5x"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Kategori</h3>
                            <p class="fs-4">4 kategori</p>
                            <p><a href="kategori.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="summary-hotel p-3">
                    <div class="row">
                        <div class="col-6" >
                            <i class="fa-solid fa-hotel fa-5x"></i>
                        </div>
                        <div class="col-6 text-white">
                            <h3 class="fs-2">Hotel</h3>
                            <p class="fs-4">.. Hotel</p>
                            <p><a href="hotel.php" class="text-white no-decoration">Lihat Detail</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>