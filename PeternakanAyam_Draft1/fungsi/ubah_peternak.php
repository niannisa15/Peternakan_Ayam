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
        if( ubah_peternak($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = '../peternak/harga_peternak.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = '../peternak/harga_peternak.php';
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
    <title>Peternakan Jati</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../style/mainpage.css" rel="stylesheet" />
</head>
<body>
    <h1>Ubah Harga Ayam</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $ternak["id"]; ?>" >
        <ul>
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