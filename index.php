
<?php
// Include config file
require_once "config.php";

error_reporting(0);
session_start();
 

if (isset($_POST['kirim'])) {
	// Mendapatkan data pengguna dari database
	$username = $_POST['nama'];
	$query = "SELECT * FROM register WHERE nama='$username'";
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
  
	// Memeriksa apakah password yang dimasukkan sesuai
	if (password_verify($_POST['password'], $user['password'])) {
	  // Jika password sesuai, proses login berhasil
	  session_start();
	  $_SESSION['id'] = $user['id'];
	  $_SESSION['nama'] = $user['nama'];
  
	  // Menampilkan pesan alert ketika login berhasil
	  echo "<script>alert('Login berhasil!');</script>";
  
	  header("Location: dashboard.php");
	  exit();
	} else {
	  // Jika password tidak sesuai, proses login gagal
	  echo "<script>alert('Username atau password salah!');</script>";
	}
  }
  
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Link ke CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</head>
<body>
<style>
	body{
		background-repeat:no-repeat;
		background-image:url('images/welcome.jpg');
		background-size:cover;
	}
</style>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-7">
                <div class="card border-0 shadow rounded-lg">
                    <div class="card-body p-5">
                        <h2 class="text-center mb-4">Login</h2>
                        <form action="" method="post">
                            <div class="form-group">
							<label for="username"><b>Username	</b></label>
                                <input type="text" class="form-control" id="username" placeholder="Enter Username" name="nama" required>
                            </div>

                            <div class="form-group">
                                <label for="password"><b>Password</b></label>
                                <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mt-4" name="kirim" value="Login">Login</button>
                            <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							
						
						</div>
									<br>
						<div>
							<a href="register1.php" class="btn btn-success">
								 Register !
							</a>	<a href="lupa_password.php" class="btn btn-danger">
								 Lupa password!!
							</a>
						</div>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
							
						
						</div>
						
					
					</div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link ke JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
