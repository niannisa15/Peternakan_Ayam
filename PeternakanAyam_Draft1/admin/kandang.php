<?php 
    session_start();
    if( !isset($_SESSION["login"])) {
        header("Location:../index.php");
        exit;
    }
    //koneksi ke database
    require '../fungsi/functions.php';
    $ternak = query("SELECT * from kondisi_kandang");
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
    <link href="../style/mainpage.css" rel="stylesheet" />
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Peternakan Jati</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="hal_admin.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="mainpage.php">Data Peternakan</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="kandang.php">Kondisi Kandang</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../fungsi/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
    <h1>Kondisi Kandang</h1>

    <a href="../fungsi/tambahkandang.php">Tambah Kondisi Kandang</a>
    <br><br>

    <div class="table-responsive">
    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Peternak</th>
        <th>Tanggal</th>
        <th>Waktu</th>
        <th>Suhu(1)</th>
        <th>Kelembapan(1)</th>
        <th>Suhu(2)</th>
        <th>Kelembapan(2)</th>
        <th>Suhu(3)</th>
        <th>Kelembapan(3)</th>
        <th>Jumlah Ayam</th>
        <th>Foto Ayam</th>
    </tr>

    <?php $i = 1;   ?>
    <?php foreach( $ternak as $row ): ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="../fungsi/hapuskandang.php?id=<?= $row["id"]; ?>">Hapus</a>
        </td>
        <td><?= $row["kd_peternak"]; ?></td>
        <td><?= $row["tgl"]; ?></td>
        <td><?= $row["waktu"]; ?></td>
        <td><?= $row["suhu_1"]; ?></td>
        <td><?= $row["kelembapan_1"]; ?></td>
        <td><?= $row["suhu_2"]; ?></td>
        <td><?= $row["kelembapan_2"]; ?></td>
        <td><?= $row["suhu_3"]; ?></td>
        <td><?= $row["kelembapan_3"]; ?></td>
        <td><?= $row["jml_ayam"]; ?></td>
        <td>
            <img src="img/<?= $row["foto_ayam"]; ?>"width="120px">
        </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
    </div>
</div>
</body>
</html>