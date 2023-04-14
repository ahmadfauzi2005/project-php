<?php
// Include config file
require_once "config.php";
$id = $_GET['id'];

function query($query){
    global $link;
    $result = mysqli_query($link, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

$query = query("SELECT * FROM indentitas WHERE id = '$id'")[0];

function upload_gambar(){
    $nama = time() . $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "source/".$nama);
    return $nama;
}

if(isset($_POST['kirim'])){
    $kelas = $_POST['nama'];
    $kelamin = $_POST['jenis_kelamin'];     
    $gambarlama = $_POST['gambarlama'];
    $Jual = $_POST['no'];
    $Beli = $_POST['tgl'];

    // Validasi nomor
    // if(strlen($Jual) > 14){
    //     $error = "Nomor tidak boleh melebihi 14 digit!";
    // }else{
    //     $result = mysqli_query($link, "SELECT * FROM indentitas WHERE no='$Jual' AND id<>'$id'");
    //     if(mysqli_num_rows($result) > 0){
    //         $error = "Nomor telah digunakan!";
    //     }
    // }

    if($_FILES['image']['error'] === 4){
        $gambar = $gambarlama;
    }else{
        if(file_exists("source/".$gambarlama)){
            unlink("source/".$gambarlama);
        }
        $gambar = upload_gambar();
    }

    $date = date('d-m-Y', strtotime($Beli));
    $insert= mysqli_query($link, "UPDATE indentitas SET
                                    name = '$gambar',
                                    nama = '$kelas',
                                    jenis_kelamin = '$kelamin' ,
                                    no = '$Jual' ,
                                    tgl = '$date' 
                                    WHERE id = '$id'");

    if($insert){
        echo"<script> alert('berhasil');
                        document.location.href= 'tampil.php'; </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 3%;
            /* color:white; */
        }
    </style>
</head>
<body style=" background-size:cover;">
    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Perbarui data</h2>
                    </div>
                   
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                    <label>Nama Anggota</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $query['nama']; ?>"required>
                        </div>
                        <div>
                            <label for="">Jenis Kelamin</label><br>
                            <input type="radio" name="jenis_kelamin" value="laki-laki"<?= ($query['jenis_kelamin'] == 'laki-laki')? "checked": ''?>>laki-laki
                            <input type="radio" name="jenis_kelamin" value="perempuan"<?= ($query['jenis_kelamin'] == 'perempuan')? "checked": ''?>>perempuan
                          </div>
                        <div>
                        <div>
                            <label for="">foto</label>
                            <input type="file" name="image" id="image" value="">
                            <img src="../gambar/source/<?php echo $query['name']; ?>" width="40%" alt=""required>
                        </div>
                        <div>
                        <label>No Telephone</label>
                            <input type="number" name="no" class="form-control" value="<?php echo $query['no']; ?>"required>
                        </div>
                        <div>
                        <label>Tanggal lahir</label>
                        <input type="date" name="tgl" class="form-control" value="<?php echo date('Y-m-d', strtotime($query['tgl'])); ?>" required>

                        </div>
                        <div>
                       
                        <br><br>
                        <input type="hidden" value="<?= $query['name'];?>" name="gambarlama">
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="perbarui" name="kirim">
                        <a href="tampil.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>