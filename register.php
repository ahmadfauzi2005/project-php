<title>Register</title>

<?php
include 'config.php';

?>

<center><h2>Register</h2></center>
<?php
$sql="SELECT * FROM register";
try {
  $query=mysqli_query($link,$sql);

} catch (mysqli_sql_exception $e) {
  
}

?>

    <center>
<table  id="customers">
    <tr>
        <td valign=top>
            
<table align=center>
    <form action="" method="post">
    <tr>
        <td>
            Nama user
        </td>
        <td>
        <input name="nama" placeholder="nama user" class="form-control">
        </td>
    </tr>
    <tr>
        <td>
        Password
        </td>
        <td>
        <input type="password" name="password" placeholder="password" class="form-control">
        </td>
    </tr>
    <tr>
        <td>

        </td>
        <td>
        <br>&nbsp;&nbsp;<button name="TambahUser">Simpan</button><button name="reset" value="reset"><a href="index.php">Batal</a> </button>
        </td>
        </form>
    </table></td>
             
</td>
</tr>
</table>

<?php
    // ini proses input

if(isset($_POST['TambahUser'])){

  $username = $_POST['nama'];
$password = $_POST['password'];
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
try{
  $query = "INSERT INTO register (nama, password) VALUES ('$username', '$hashedPassword')";
  if(mysqli_query($link,$query)){
    header('location:index.php');
}else{
   echo mysqli_error($link);
} } catch(mysqli_sql_exception $e){
  if ($e->getCode() == 1062) {
    // Duplicate user
   echo "<script>alert('username sudah digunakan !!')</script>";
} else {
    throw $e;// in case it's any other error
}
}
// Membuat hash dari password


// Menyimpan data pengguna ke database

$result = mysqli_query($link, $query);

if ($result) {
  // Jika penyimpanan data pengguna berhasil, arahkan ke halaman login
  header("Location: index.php");
  exit();
} else {
  // Jika penyimpanan data pengguna gagal, tampilkan pesan error
  echo "<script>alert('username telah digunakan')</script>";
}
}
?> 