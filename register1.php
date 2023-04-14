	<?php
	session_start();
	include('config.php');

	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$nama = $_POST["nama"];
	$password = $_POST["password"];

	if($_POST["password"] !== $_POST["confirm_password"]) {
		$_SESSION['error'] = 'Konfirmasi password tidak cocok!';
		header('Location: http://localhost/nyoba/register1.php');
		exit();
	  }

	$query = "SELECT * FROM register WHERE nama='$nama'";
	$result = mysqli_query($link, $query);

	if(mysqli_num_rows($result) == 0) {
		if($password == $password) {
		$hashed_password = password_hash($password, PASSWORD_DEFAULT);
		$query = "INSERT INTO register (nama, password) VALUES ('$nama', '$hashed_password')";
		mysqli_query($link, $query);
		$_SESSION['success'] = 'Registrasi berhasil!';
		header('Location:http://localhost/nyoba/index.php');
		exit();
		} else {
		$_SESSION['error'] = 'Password tidak cocok!!!';
		}
	} else {
		$_SESSION['error'] = 'Username atau password sudah digunakan';
	}	
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title>Registrasi</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container mt-5">
			<div class="row justify-content-center">
				<div class="col-md-6">
					<center><h2>Registrasi</h2></center><br>
					<?php if(isset($_SESSION['error'])) { ?>
						<div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
						<?php unset($_SESSION['error']); ?>
					<?php } ?>

					<form method="post">

						<div class="form-group">
							<label for="nama">Username:</label>
							<input type="text" name="nama" class="form-control" required>
						</div>


						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" name="password" class="form-control" required>
						</div>

						<div class="form-group">
  <label for="confirm_password">Konfirmasi Password:</label>
  <input type="password" name="confirm_password" class="form-control" required>
</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Daftar</button>
						</div>

					</form>
					<p>Sudah memiliki akun? <a href="index.php">Login disini</a></p>
				</div>
			</div>
		</div>
	</body>
	</html>
