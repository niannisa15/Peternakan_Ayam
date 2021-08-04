<?php 
    session_start();
    if( !isset($_SESSION["login"])) {
        header("Location:../index.php");
        exit;
    }

    //koneksi ke database
    require '../fungsi/functions.php';
    $ternak = query("SELECT * from tabel_login WHERE id_grup !='admin'");
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
                    <li class="nav-item"><a class="nav-link" href="hal_peternak.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="harga_peternak.php">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="kandang_peternak.php">Kondisi Kandang</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi_peternak.php">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../fungsi/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
    <h1>Harga Ayam</h1>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>Nama</th>
        <th>Harga</th>
    </tr>

    <?php $i = 1;   ?>
    <?php foreach( $ternak as $row ): ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="../fungsi/ubah_peternak.php?id=<?= $row["id"]; ?>">Ubah</a> 
        </td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["harga"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
</div>
</body>
</html>