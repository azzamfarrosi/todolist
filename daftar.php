<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR</title>
    <link rel="stylesheet" href="login/style.css">
</head>

<body>
    <div class="wrapper">
        <form method="post">
            <h2>Daftar</h2>
            <div class="input-field">
                <input type="text" name="nama" required>
                <label>Nama</label>
            </div>
            <div class="input-field">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <br><br>
            <button type="submit" name="daftar" value="daftar">Daftar</button>
            <div class="register">
                <p>Sudah Punya Akun ? <a href="index.php">Login</a></p>
            </div>
        </form>
        <?php
        if (isset($_POST["daftar"])) {
            $nama = $_POST['nama'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $ambil = $koneksi->query("SELECT*FROM admin 
							WHERE email='$email'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok == 1) {
                echo "<script>alert('Pendaftaran Gagal, email sudah ada')</script>";
                echo "<script>location='daftar.php';</script>";
            } else {
                $koneksi->query("INSERT INTO admin	(nama, email,  password)
								VALUES('$nama','$email','$password')");
                echo "<script>alert('Pendaftaran Berhasil')</script>";
                echo "<script>location='index.php';</script>";
            }
        }
        ?>
    </div>
</body>

</html>