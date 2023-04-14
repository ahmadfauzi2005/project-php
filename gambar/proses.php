<?php
require_once "config.php";

function upload_gambar(){
    $nama = time() . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp,"source/".$nama);
    return $nama;
}

if(isset($_POST['kirim'])){
    $kelas = $_POST['nama'];
    $kelamin = $_POST['jenis_kelamin'];
    $gambar = upload_gambar();
    $jual = $_POST['no'];
    $beli = $_POST['tgl'];
    
    // Cek apakah tanggal valid
    if (!checkdate(date('m', strtotime($beli)), date('d', strtotime($beli)), date('Y', strtotime($beli)))) {
        echo "<script>alert('Format tanggal tidak valid!');
        document.location.href= 'create.php';</script>";
        exit;
    }
    
    $beli1 = date('d-m-Y', strtotime($beli));

    // Cek apakah nomor sudah ada di database
    if(strlen($jual) > 14){
        // Jika nomor lebih dari 14 digit, tampilkan pesan error
        echo"<script> alert('Nomor tidak boleh melebihi 14 digit');
                document.location.href= 'create.php'; </script>";
    } else {
        $cek_no = mysqli_query($link, "SELECT * FROM indentitas WHERE no='$jual'");
        if(mysqli_num_rows($cek_no) > 0){
            // Jika nomor sudah ada, tampilkan pesan error
            echo"<script> alert('Nomor telah digunakan');
                    document.location.href= 'create.php'; </script>";
        } else {
            // Jika nomor belum ada dan tidak melebihi 14 digit, lakukan operasi insert
            $insert = mysqli_query($link, "INSERT INTO indentitas (name, nama, jenis_kelamin, no, tgl) 
            VALUES ('$gambar', '$kelas', '$kelamin', '$jual', '$beli1')");

            if($insert){
                echo"<script> alert('Berhasil');
                                document.location.href= 'tampil.php'; </script>";
            }
        }
    }
} else {
    echo"<script> alert('Terjadi kesalahan');
            document.location.href= 'create.php'; </script>";  
}
?>
