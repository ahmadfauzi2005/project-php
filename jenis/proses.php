<?php 
require_once "config.php";

if(isset($_POST['kirim'])){
   
    $id_jenis = $_POST['id_jenis']; 
    $jenis = $_POST['jenis'];

    // Cek apakah id_jenis sudah ada di dalam database
    $cek_id = mysqli_query($link, "SELECT * FROM jenis_angsuran WHERE id_jenis='$id_jenis'");
    if(mysqli_num_rows($cek_id) > 0){
        echo "<script>alert('ID jenis sudah digunakan');
        document.location.href= 'create.php'; </script>";
    }
    else{
        $insert = mysqli_query($link, "INSERT INTO jenis_angsuran (id_jenis,jenis) VALUES ('$id_jenis','$jenis')");

        if($insert){
            echo"<script> alert('berhasil');                                                                                                                                                         
                            document.location.href= 'tampil.php'; </script>";
        }
    }
}
?>



