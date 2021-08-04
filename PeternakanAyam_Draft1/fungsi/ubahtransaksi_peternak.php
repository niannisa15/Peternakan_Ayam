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
    $transaksi = query("SELECT * FROM tabel_transaksi WHERE id = $id") [0];

    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        
    //cek apakah data berhasil diubah atau tidak
        if( ubahtransaksi_peternak($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil diubah!');
                document.location.href = '../peternak/transaksi_peternak.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal diubah!');
                document.location.href = '../peternak/transaksi_peternak.php';
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
    <h1>Ubah Data Transaksi</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $transaksi["id"]; ?>" >
        <ul>
            <li>
            <label for="jml">Jumlah :</label>
            <input type="text" id="jml" name="jml" required value="<?= $transaksi["jml"] ?>" >
            </li>
            <li>
            <label for="harga">Harga :</label>
            <input type="text" id="harga" name="harga" required value="<?= $transaksi["harga"] ?>">
            </li>
            <li>
            <label for="total">Total :</label>
            <input type="text" id="total" name="total" required value="<?= $transaksi["total"] ?>">
            </li>
            <br><br>
            <li>
            <button type="submit" name="submit">Ubah</button>
            </li>
        </ul>
    </form>
</body>
</html>