<?php 
    //koneksi ke MySQL dengan memasukkan variabel nama host, username, password dan nama basis data yang akan digunakan
    //variabel di PHP diawali dengan tanda ‘$’
    $link = mysqli_connect('localhost', 'tkacom_annisa02', '3720469_*D2X', 'tkacom_peternakan_annisa');

    function query($query) {
        global $link;
        $result = mysqli_query($link, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $link;
        //ambil data dari tiap elemen dalam form
        $user = htmlspecialchars($data["user"]);
        $pass = htmlspecialchars($data["pass"]);
        $id_grup = htmlspecialchars($data["id_grup"]);
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $tlp = htmlspecialchars($data["tlp"]);
        $email = htmlspecialchars($data["email"]);
        $stok = htmlspecialchars($data["stok"]);
        $harga = htmlspecialchars($data["harga"]);

        
        //query insert data
        $query = "INSERT INTO tabel_login
                    VALUES
                    ('','$user','$pass','$id_grup','$nama','$alamat','$kota','$tlp','$email','','','$stok','$harga')";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);

    }
    
    
    function hapus($id) {
        global $link;
        mysqli_query($link, "DELETE FROM tabel_login WHERE id = $id");

        return mysqli_affected_rows($link);
    }

    function ubah($data) {
        global $link;

        $id = $data["id"];
        $user = htmlspecialchars($data["user"]);
        $pass = htmlspecialchars($data["pass"]);
        $id_grup = htmlspecialchars($data["id_grup"]);
        $nama = htmlspecialchars($data["nama"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $tlp = htmlspecialchars($data["tlp"]);
        $email = htmlspecialchars($data["email"]);
        $stok = htmlspecialchars($data["stok"]);
        $harga = htmlspecialchars($data["harga"]);

        $query = "UPDATE tabel_login SET
                    user = '$user',
                    pass = '$pass',
                    id_grup = '$id_grup',
                    nama = '$nama',
                    alamat = '$alamat',
                    kota = '$kota',
                    tlp = $tlp,
                    email = '$email',
                    stok = $stok,
                    harga = $harga

                    WHERE id = $id
                    ";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    function tambahkandang($data) {
        global $link;
        //ambil data dari tiap elemen dalam form
        $kd_peternak = htmlspecialchars($data["kd_peternak"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $suhu_1 = htmlspecialchars($data["suhu_1"]);
        $kelembapan_1 = htmlspecialchars($data["kelembapan_1"]);
        $suhu_2 = htmlspecialchars($data["suhu_2"]);
        $kelembapan_2 = htmlspecialchars($data["kelembapan_2"]);
        $suhu_3 = htmlspecialchars($data["suhu_3"]);
        $kelembapan_3 = htmlspecialchars($data["kelembapan_3"]);
        $jml_ayam = htmlspecialchars($data["jml_ayam"]);
        
        $foto_ayam = upload();
        if(!$foto_ayam) {
            return false;
        }
      
        //query insert data
        $query = "INSERT INTO kondisi_kandang
                    VALUES
                    ('','$kd_peternak','$tgl','$waktu','$suhu_1','$kelembapan_1','$suhu_2','$kelembapan_2','$suhu_3','$kelembapan_3','$jml_ayam','$foto_ayam')";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }
    
    function upload() {
        $namafile = $_FILES['foto_ayam']['name'];
        $ukuran = $_FILES['foto_ayam']['size'];
        $error = $_FILES['foto_ayam']['error'];
        $tmpName = $_FILES['foto_ayam']['tmp_name'];

        if($error === 4) {
            echo "<script>
                alert('Masukkan foto terlebih dahulu!');
                </script>";
            return false;
        }
        $ekstensifotovalid = ['jpg','jpeg','png'];
        $ekstensifoto = explode('.', $namafile);
        $ekstensifoto = strtolower(end($ekstensifoto));
        if(!in_array($ekstensifoto, $ekstensifotovalid)) {
            echo "<script>
                alert('Bukan file foto');
                </script>";
            return false;
        }
        if($ukuran > 1000000) {
            echo "<script>
                alert('Ukuran foto terlalu besar!');
                </script>";
            return false;
        }
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensifoto;
        move_uploaded_file($tmpName, 'img/'.$namafilebaru);
        return $namafilebaru;
    }

    function hapuskandang($id) {
        global $link;
        mysqli_query($link, "DELETE FROM kondisi_kandang WHERE id = $id");

        return mysqli_affected_rows($link);
    }

    function tambahtransaksi($data) {
        global $link;
        //ambil data dari tiap elemen dalam form
        $kd_peternak = htmlspecialchars($data["kd_peternak"]);
        $kd_penjual = htmlspecialchars($data["kd_penjual"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $jml = htmlspecialchars($data["jml"]);
        $harga = htmlspecialchars($data["harga"]);
        $total = htmlspecialchars($data["total"]);

        
        //query insert data
        $query = "INSERT INTO tabel_transaksi
                    VALUES
                    ('','$kd_peternak','$kd_penjual','$tgl','$waktu','$jml','$harga','$total')";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    function hapustransaksi($id) {
        global $link;
        mysqli_query($link, "DELETE FROM tabel_transaksi WHERE id = $id");

        return mysqli_affected_rows($link);
    }

    function ubah_peternak($data) {
        global $link;

        $id = $data["id"];
        $harga = htmlspecialchars($data["harga"]);

        $query = "UPDATE tabel_login SET
                    harga = '$harga'

                    WHERE id = $id
                    ";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    function ubahtransaksi_peternak($data) {
        global $link;

        $id = $data["id"];
        $jml = htmlspecialchars($data["jml"]);
        $harga = htmlspecialchars($data["harga"]);
        $total = htmlspecialchars($data["total"]);

        $query = "UPDATE tabel_transaksi SET
                    jml = '$jml',
                    harga = '$harga',
                    total = '$total'

                    WHERE id = $id
                    ";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    function tambahtransaksi_penjual($data) {
        global $link;
        //ambil data dari tiap elemen dalam form
        $kd_peternak = htmlspecialchars($data["kd_peternak"]);
        $kd_penjual = htmlspecialchars($data["kd_penjual"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $jml = htmlspecialchars($data["jml"]);
        $harga = htmlspecialchars($data["harga"]);
        $total = htmlspecialchars($data["total"]);

        
        //query insert data
        $query = "INSERT INTO tabel_transaksi
                    VALUES
                    ('','$kd_peternak','$kd_penjual','$tgl','$waktu','$jml','$harga','$total')";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }

    function tambahtransaksi_peternak($data) {
        global $link;
        //ambil data dari tiap elemen dalam form
        $kd_peternak = htmlspecialchars($data["kd_peternak"]);
        $kd_penjual = htmlspecialchars($data["kd_penjual"]);
        $tgl = htmlspecialchars($data["tgl"]);
        $waktu = htmlspecialchars($data["waktu"]);
        $jml = htmlspecialchars($data["jml"]);
        $harga = htmlspecialchars($data["harga"]);
        $total = htmlspecialchars($data["total"]);

        
        //query insert data
        $query = "INSERT INTO tabel_transaksi
                    VALUES
                    ('','$kd_peternak','$kd_penjual','$tgl','$waktu','$jml','$harga','$total')";

        mysqli_query($link, $query);

        return mysqli_affected_rows($link);
    }
?>