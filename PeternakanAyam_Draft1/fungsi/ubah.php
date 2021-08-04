<?php    
    session_start();

    if( !isset($_SESSION["login"])) {
        header("Location:../index.php");
        exit;
    }
    require 'functions.php';

    //ambil data di URL
    $id = $_GET["id"];
    // query data peternakan berdasarkan id
    $ternak = query("SELECT * FROM tabel_login WHERE id = $id") [0];

    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        
    //cek apakah data berhasil diubah atau tidak
        if( ubah($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = '../admin/mainpage.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal diubah!');
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
    <title>Ubah Data Peternakan</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../style/mainpage.css" rel="stylesheet" />
</head>
<body>
    <h1>Ubah Data Peternakan</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $ternak["id"]; ?>" >
        <ul>
            <li>
            <label for="user">ID User :</label>
            <input type="user" id="user" name="user" required value="<?= $ternak["user"] ?>" >
            </li>
            <li>
            <label for="pass">Password :</label>
            <input type="text" id="pass" name="pass" required value="<?= $ternak["pass"] ?>">
            </li>
            <li>
            <label for="id_grup">ID Grup :</label>
            <input type="text" id="id_grup" name="id_grup" required value="<?= $ternak["id_grup"] ?>">
            </li>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" required value="<?= $ternak["nama"] ?>">
            </li>
            <li>
            <label for="alamat">Alamat :</label>
            <input type="text" id="alamat" name="alamat" required value="<?= $ternak["alamat"] ?>">
            </li>
            <li>
            <label for="kota">Kota :</label>
            <input type="text" id="kota" name="kota" required value="<?= $ternak["kota"] ?>">
            </li>
            <li>
            <label for="tlp">Telepon :</label>
            <input type="text" id="tlp" name="tlp" required value="<?= $ternak["tlp"] ?>">
            </li>
            <li>
            <label for="email">Email :</label>
            <input type="text" id="email" name="email" required value="<?= $ternak["email"] ?>">
            </li>
            <li>
            <label for="stok">Stok :</label>
            <input type="text" id="stok" name="stok" required value="<?= $ternak["stok"] ?>">
            </li>
            <li>
            <label for="harga">Harga :</label>
            <input type="text" id="harga" name="harga" required value="<?= $ternak["harga"] ?>">
            </li>
            <br><br>
            <li>
            <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
</body>
</html>