<?php 
require_once "config.php";

if(isset($_POST['kirim'])){
   
    $id_pinjaman = $_POST['id_pinjaman']; 
    $nama_anggota = $_POST['nama_anggota'];
    $nama_angsuran = $_POST['nama_angsuran'];
    $nama_petugas = $_POST['nama_petugas'];

    // Cek apakah id_jenis sudah ada di dalam database
    $cek_id = mysqli_query($link, "SELECT * FROM pinjaman WHERE id_pinjaman='$id_pinjaman'");
    if(mysqli_num_rows($cek_id) > 0){
        echo "<script>alert('Id  sudah digunakan');
        document.location.href= 'create.php'; </script>";
    }
    else{
        $insert = mysqli_query($link, "INSERT INTO pinjaman (id_pinjaman,nama_anggota,nama_angsuran,nama_petugas) VALUES ('$id_pinjaman','$nama_anggota','$nama_angsuran','$nama_petugas')");

        if($insert){
            echo"<script> alert('berhasil');
                            document.location.href= 'tampil.php'; </script>";
        }
    }
}
?>
