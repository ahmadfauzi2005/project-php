<?php
session_start();
include('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = mysqli_real_escape_string($link, $_POST["nama"]); // Menambahkan sanitasi input
  $query = "SELECT * FROM register WHERE nama='$username'";
  $result = mysqli_query($link, $query);

  if(mysqli_num_rows($result) == 1) {
    $new_password = mysqli_real_escape_string($link, $_POST['new_password']); // Menambahkan sanitasi input
    $confirm_password = mysqli_real_escape_string($link, $_POST['confirm_password']); // Menambahkan sanitasi input

    if($new_password == $confirm_password) {
      $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
      $query = "UPDATE register SET password='$hashed_password' WHERE nama='$username'"; // Mengubah $nama menjadi $username agar query UPDATE bisa berjalan dengan benar
      mysqli_query($link, $query);
      $_SESSION['success'] = 'Password berhasil direset!';
      header('Location: index.php');
      exit();
    } else {
      $_SESSION['error'] = 'Password baru tidak cocok dengan konfirmasi password';
      header('Location: reset-password.php'); // Mengarahkan kembali ke halaman reset-password.php
      exit();
    }
  } else {
    $_SESSION['error'] = 'Username tidak ditemukan';
    header('Location: reset-password.php'); // Mengarahkan kembali ke halaman reset-password.php
    exit();
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Reset Password</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
 
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 50%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
<body>
  <?php if(isset($_SESSION['error'])) { ?>
    <div><?php echo $_SESSION['error']; ?></div>
    <?php unset($_SESSION['error']); ?>
  <?php } ?>
  <center>
  <form method="post">
     <div>
        <label for="nama">Nama pengguna:</label><br>
        <input type="text" name="nama" class="form-control" required >
     </div>
    <div>
        <label for="new_password">Password baru:</label> <br>
        <input type="password" name="new_password" class="form-control" required>
    </div>
    <div>
          <label for="confirm_password">Konfirmasi password baru:</label> <br>
          <input type="password" name="confirm_password" required class="form-control">
    </div>   <br>
       <button type="submit" class="w3-button w3-red">Reset password</button>  
        <button type="back" class="w3-button w3-grey"> <a href="dashboard.php">Kembali ke menu</a> </button>  </form>
    </form>
</body>
</html>
