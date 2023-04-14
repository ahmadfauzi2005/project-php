<?php 
require_once "config.php";

if(isset($_POST['kirim'])){
    $username = $_POST['username'];   
    $password =$_POST['password'];
    $namalkp = $_POST['nama_lengkap'];
    $contact = $_POST['contact'];
    $pejabat = $_POST['level'];

    // Cek apakah username sudah ada di dalam database
    $cek_username = mysqli_query($link, "SELECT * FROM petugas WHERE username='$username'");
    if(mysqli_num_rows($cek_username) > 0){
        echo "<script>alert('Username sudah digunakan');
        document.location.href= 'create.php'; </script>";
    }
    else{
        // Cek apakah contact sudah ada di dalam database
        $cek_contact = mysqli_query($link, "SELECT * FROM petugas WHERE contact='$contact'");
        if(mysqli_num_rows($cek_contact) > 0){
            echo "<script>alert('Contact sudah digunakan');
            document.location.href= 'create.php'; </script>";
        }
        else{
            $insert = mysqli_query($link, "insert into petugas(username,password,nama_lengkap,contact,level) values('$username','$password','$namalkp','$contact','$pejabat')");

            if($insert){
                echo"<script> alert('Berhasil');
                        document.location.href= 'tampil.php'; </script>";
            } else {
                echo "<script> alert('Gagal: " . mysqli_error($link) . "');
                        document.location.href= 'tampil.php'; </script>";
            }
        }
    }
}
?>
