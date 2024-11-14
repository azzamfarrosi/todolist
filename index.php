<?php
include 'koneksi.php';
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>LOGIN</title>
	<link rel="stylesheet" href="login/style.css">
</head>

<body>
	<div class="wrapper">
		<form method="post">
			<h2>Login</h2>
			<div class="input-field">
				<input type="text" name="email"  required>
				<label>Email</label>
			</div>
			<div class="input-field">
				<input type="password" name="password" required>
				<label>Password</label>
			</div>
			<br><br>
			<button type="submit" name="simpan" value="Masuk">Log In</button>
			<div class="register">
				<p>Tidak Punya Akun ? <a href="daftar.php">Daftar</a></p>
			</div>
		</form>
		<?php
		if (isset($_POST["simpan"])) {
			$email = $_POST["email"];
			$password = $_POST["password"];
			$ambil = $koneksi->query("SELECT * FROM admin
		WHERE email='$email' AND password='$password' limit 1");
			$akunyangcocok = $ambil->num_rows;
			if ($akunyangcocok == 1) {
				$akun = $ambil->fetch_assoc();
				$_SESSION['admin'] = $akun;
				echo "<script> alert('Anda sukses login');</script>";
				echo "<script> location ='admin/index.php';</script>";
			} else {
				echo "<script> alert('Anda gagal login, Cek akun anda');</script>";
				echo "<script> location ='login.php';</script>";
			}
		}
		?>
	</div>
</body>

</html>