<?php 
 
 session_start();
  
 if (!isset($_SESSION['nama'])) {
     header("Location:http://localhost/NYOBA/index.php");
 }
?>


<?php 
require_once "config.php";

if(isset($_POST['kirim'])){
   
    $angsuran = $_POST['angsuran'];
   
    $jenis =$_POST['id_jenis'];
    
    $insert = mysqli_query($link, "insert into angsuran(angsuran,jenis) values('$angsuran','$jenis')");

    if($insert){
        echo"<script> alert('berhasil');
                        document.location.href= 'tampil.php'; </script>";
    }
}


?>