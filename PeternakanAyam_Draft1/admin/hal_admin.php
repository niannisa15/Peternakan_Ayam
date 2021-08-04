<?php
    session_start();
    if( !isset($_SESSION["login"])) {
        header("Location:../index.php");
        exit;
    }
    //koneksi ke database
    require '../fungsi/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peternakan Jati</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../style/mainpage.css" rel="stylesheet"/>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Peternakan Jati</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="hal_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="mainpage.php">Data Peternakan</a></li>
                    <li class="nav-item"><a class="nav-link" href="kandang.php">Kondisi Kandang</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../fungsi/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <section id="hero" class="d-flex align-items-center">
        <div class="container" style="margin-top:10%;">
            <div class="row justify-content-center">
                <div class="col-lg-6 d-flex flex-column" data-aos="fade-up" data-aos-delay="200">
                    <h1 style="font-size: 40px;">Selamat Datang di Halaman Admin</h1>
                    <h2 style="font-size: 20px;">Halaman ini hanya ditujukan untuk admin agar bisa mengedit dan melihat data yang ada di Peternakan</h2>
                </div>
                    <div class="col-lg-4 d-flex flex-row order-1 order-lg-2 hero-img justify-content-right" data-aos="zoom-in" data-aos-delay="200">
                        <img src="../img/ayam.jpg" class="img-fluid animated" alt="">
                    </div>
            </div>
        </div>

    </section>
</body>
</html>