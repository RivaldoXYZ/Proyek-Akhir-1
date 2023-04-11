<?php
    session_start();
    require "../Connection/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
        <div class="main d-flex flex-column justify-content-center align-items-center">
            <div class="login-box p-5 shadow">
                <form action="" method="post">
                    <h1 style="text-align:center; font-weight:bold">Toba Gateway</h1>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button name="btnsubmit" type="submit" class="btn btn-primary mt-3">Login</button>
                </form>
            </div>
            <div class="mt-3" style="width: 35rem;">
            <?php 
                if (isset($_POST['btnsubmit'])) {
                    $username = htmlspecialchars($_POST['username']);
                    $password = htmlspecialchars($_POST['password']);

                    $query = mysqli_query($con, "SELECT * FROM users where username = '$username'");
                    $countdata = mysqli_num_rows($query);
                    $data = mysqli_fetch_array($query);

                    if ($countdata>0) {
                        if (password_verify($password, $data['password'])) {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['login.php'] = true;
                                header('location: index.php');
                        }else {
                            ?>
                        <div class="alert alert-warning" role="alert">Password Salah</div>  
                        <?php
                        }
                    }else {
                        ?>
                        <div class="alert alert-warning" role="alert">Akun Tidak ditemukan</div>  
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>