<?php
    session_start();

    if( !isset($_SESSION["login"])) {
        header("Location:../index.php");
        exit;
    }
    require 'functions.php';
    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        
    //cek apakah data berhasil ditambahkan atau tidak
        if( tambahkandang($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = '../admin/kandang.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = '../admin/kandang.php';
            </script>
            ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Peternakan</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../style/mainpage.css" rel="stylesheet" />
</head>
<body>
    <h1>Tambah Data Kondisi Kandang</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
            <label for="kd_peternak">Kode Peternak :</label>
            <input type="text" id="kd_peternak" name="kd_peternak" required>
            </li>
            <li>
            <label for="tgl">Tanggal :</label>
            <input type="text" id="tgl" name="tgl" required>
            </li>
            <li>
            <label for="waktu">Waktu :</label>
            <input type="text" id="waktu" name="waktu" required>
            </li>
            <li>
            <label for="suhu_1">Suhu 1 :</label>
            <input type="text" id="suhu_1" name="suhu_1" required>
            </li>
            <li>
            <label for="kelembapan_1">Kelembapan 1 :</label>
            <input type="text" id="kelembapan_1" name="kelembapan_1" required>
            </li>
            <li>
            <label for="suhu_2">Suhu 2 :</label>
            <input type="text" id="suhu_2" name="suhu_2" required>
            </li>
            <li>
            <label for="kelembapan_2">Kelembapan 2 :</label>
            <input type="text" id="kelembapan_2" name="kelembapan_2" required>
            </li>
            <li>
            <label for="suhu_3">Suhu 3 :</label>
            <input type="text" id="suhu_3" name="suhu_3" required>
            </li>
            <li>
            <label for="kelembapan_3">Kelembapan 3 :</label>
            <input type="text" id="kelembapan_3" name="kelembapan_3" required>
            </li>
            <li>
            <label for="jml_ayam">Jumlah Ayam :</label>
            <input type="number" id="jml_ayam" name="jml_ayam" required>
            </li>
            <li>
            <label for="foto_ayam">Foto Ayam :</label>
            <input type="file" id="foto_ayam" name="foto_ayam" required>
            </li>
            <br><br>
            <li>
            <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>