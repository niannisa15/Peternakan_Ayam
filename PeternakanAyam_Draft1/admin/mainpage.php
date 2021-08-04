<?php 
    session_start();
    if( !isset($_SESSION["login"])) {
        header("Location:index.php");
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
    <title>Jati Kulon</title>
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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="mainpage.php">Data Peternakan</a></li>
                    <li class="nav-item"><a class="nav-link" href="kandang.php">Kondisi Kandang</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaksi.php">Transaksi</a></li>
                    <li class="nav-item"><a class="nav-link" href="../fungsi/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div>
    <h1>Data Peternakan</h1>

    <a href="../fungsi/tambah.php">Tambah Data Peternakan</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No.</th>
        <th>Aksi</th>
        <th>User</th>
        <th>ID Group</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Telepon</th>
        <th>Email</th>
        <th>Last Login</th>
        <th>Create Login</th>
        <th>Stok</th>
        <th>Harga</th>
    </tr>

    <?php $i = 1;   ?>
    <?php foreach( $ternak as $row ): ?>
    <tr>
        <td><?= $i; ?></td>
        <td>
            <a href="../fungsi/ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
            <a href="../fungsi/hapus.php?id=<?= $row["id"]; ?>">Hapus</a>
        </td>
        <td><?= $row["user"]; ?></td>
        <td><?= $row["id_grup"]; ?></td>
        <td><?= $row["nama"]; ?></td>
        <td><?= $row["alamat"]; ?></td>
        <td><?= $row["kota"]; ?></td>
        <td><?= $row["tlp"]; ?></td>
        <td><?= $row["email"]; ?></td>
        <td><?= $row["last_login"]; ?></td>
        <td><?= $row["create_login"]; ?></td>
        <td><?= $row["stok"]; ?></td>
        <td><?= $row["harga"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
    </table>
</div>
</body>
</html>