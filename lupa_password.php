<?php
session_start();
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST["nama"];
  $query = "SELECT * FROM register WHERE nama='$nama'";
  $result = mysqli_query($link, $query);

        if(mysqli_num_rows($result) == 1) {
                $new_password = $_POST['new_password'];
                $confirm_password = $_POST['confirm_password'];
                        if($new_password == $confirm_password) {
                        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $query = "UPDATE register SET password='$hashed_password' WHERE nama='$nama'";
                    mysqli_query($link, $query);
                    $_SESSION['success'] = 'Password berhasil direset!';
                    header('Location:http://localhost/nyoba/index.php');
            exit();
    } else {
      $_SESSION['error'] = '<script>alert("Password tidak cocok!!!")</script>';
    }
  } else {
    $_SESSION['error'] = '<script>alert("username tidak di temukan")</script>';
  }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ubah Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
			<center><h2>Lupa Password</h2></center><br>
				<?php if(isset($_SESSION['error'])) { ?>
				    <div class="alert alert-danger">Masukkan input data dengan benar!!<?php echo $_SESSION['error']; ?></div>
				    <?php unset($_SESSION['error']); ?>
				<?php } ?>
				
				<form method="post"> 

					<div class="form-group">
					<label for="nama">Username:</label>
					    <input type="text" name="nama" class="form-control" required >
					</div>

				    <div class="form-group">
					    <label for="new_password">Password Baru:</label>
					    <input type="password" name="new_password" class="form-control" required >
					</div>

				    <div class="form-group">
				          <label for="confirm_password">Konfirmasi password Baru:</label>
				          <input type="password" name="confirm_password" required  class="form-control">
				    </div>

				    <div class="form-group">
				    	<button type="submit" class="btn btn-primary btn-block">Ubah password</button>
				    </div>

				</form>

				<a href="index.php" class="btn btn-danger">Kembali</a>

			</div>
		</div>
	</div>
</body>
</html>