<?php
    session_start();
    require 'fungsi/functions.php';
    if( isset($_SESSION["login"])) {
        header("Location:admin/hal_admin.php");
        exit;
    }
    if( isset($_POST["login"]))  {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $query = mysqli_query($link, "SELECT * fROM tabel_login WHERE user = '$user' AND pass = '$pass'");
        $cek = mysqli_num_rows($query);
        if ($cek == 0) {
            //set session
            echo "
            <script>
                alert('Cek Username dan Password Anda!');
                document.location.href = 'index.php';
            </script>
            ";
            exit();
        }
        else {
            $row = mysqli_fetch_assoc($query);
                $_SESSION['user'] = $row['user'];
                $_SESSION['id_grup'] = $row['id_grup'];
                if ($row['id_grup'] == "admin") {
                    $_SESSION["login"] = true;
                    header("Location:admin/hal_admin.php");
                }
                else if
                    ($row['id_grup'] == "peternak") {
                        $_SESSION["login"] = true;
                        header("Location:peternak/hal_peternak.php");
                    }
                else if
                    ($row['id_grup'] == "penjual") {
                        $_SESSION["login"] = true;
                        header("Location:penjual/hal_penjual.php");
                    }
                else {
                    $error = "Failed login";
                }
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
    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <form action="" class="box" role="form" method="post">
                    <h1>Login</h1>
                    <p class="text-muted"> Please enter your login and password!</p> 
                    <input for="user" type="text" id="user" name="user" placeholder="Username"> 
                    <input for="pass" type="password" id="pass" name="pass" placeholder="12345"> 
                    <input type="submit" name="login" value="Login">
                </form>
            </div>
        </div>
    </div>
</div>
</body>

</html>