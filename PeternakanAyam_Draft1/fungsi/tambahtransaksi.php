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
        if( tambahtransaksi($_POST) > 0 ) {
            echo "
            <script>
                alert('Data berhasil ditambahkan!');
                document.location.href = '../admin/transaksi.php';
            </script>
            ";
        }
        else {
            echo "
            <script>
                alert('Data gagal ditambahkan!');
                document.location.href = '../admin/transaksi.php';
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
    <title>Tambah Data Transaksi</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../style/mainpage.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Tambah Data Transaksi</h1>
    <form action="" method="post">
        <ul>
            <li>
            <label for="kd_peternak">Kode Peternak :</label>
            <input type="text" id="kd_peternak" name="kd_peternak" required>
            </li>
            <li>
            <label for="kd_penjual">Kode Penjual :</label>
            <input type="text" id="kd_penjual" name="kd_penjual" required>
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
            <label for="jml">Jumlah :</label>
            <input type="number" id="jml" name="jml" required>
            </li>
            <li>
            <label for="harga">Harga :</label>
            <input type="number" id="harga" name="harga" required>
            </li>
            <li>
            <label for="total">Total :</label>
            <input type="number" id="total" name="total" required>
            </li>
            <br><br>
            <li>
            <button type="submit" name="submit">Tambah</button>
            </li>
        </ul>
    </form>
</body>
<script>
$("document").ready(function(){
function calculateTotal(e){
let jml = parseFloat($("#jml").val());
let harga = parseFloat($("#harga").val());

if(jml && harga){
  let total = jml * harga;

  $("#total").val(total);
} else{
  $("#total").val(0);
}
}

$("#jml").keyup(calculateTotal);
$("#harga").keyup(calculateTotal);
});
</script>
</html>