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
        if( tambah($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = '../admin/mainpage.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = '../admin/mainpage.php';
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
    <h1>Tambah Data Peternakan</h1>
    <form action="" method="post">
        <ul>
            <li>
            <label for="user">User :</label>
            <input type="user" id="user" name="user" required>
            </li>
            <li>
            <label for="pass">Password :</label>
            <input type="text" id="pass" name="pass" required>
            </li>
            <li>
            <label for="id_grup">ID Grup :</label>
            <input type="text" id="id_grup" name="id_grup" required>
            </li>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" required>
            </li>
            <li>
            <label for="alamat">Alamat :</label>
            <input type="text" id="alamat" name="alamat" required>
            </li>
            <li>
            <label for="kota">Kota :</label>
            <input type="text" id="kota" name="kota" required>
            </li>
            <li>
            <label for="tlp">Telepon :</label>
            <input type="text" id="tlp" name="tlp" required>
            </li>
            <li>
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required>
            </li>
            <li>
            <label for="stok">Stok :</label>
            <input type="text" id="stok" name="stok" required>
            </li>
            <li>
            <label for="harga">Harga :</label>
            <input type="text" id="harga" name="harga" required>
            </li>
            <br><br>
            <li>
            <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>