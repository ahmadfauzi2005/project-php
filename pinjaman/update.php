<?php
// Include config file
require_once "config.php";

// Check if user is logged in, redirect to login page if not
session_start();
if (!isset($_SESSION['nama'])) {
    header("Location:http://localhost/toko/index.php");
}

$identitas_result = mysqli_query($link, "SELECT * FROM indentitas");
$identitas_result2 = mysqli_query($link, "SELECT * FROM angsuran");
$identitas_result3 = mysqli_query($link, "SELECT * FROM petugas");

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

$query = query("SELECT * FROM pinjaman WHERE id = '$id'")[0];

if(isset($_POST['kirim'])){
    if(isset($_POST['kirim'])){
        // Get form data
        $nama = $_POST['id_pinjaman'];
        $produk = $_POST['nama_anggota'];
        $stok = $_POST['nama_angsuran'];
        $stok2 = $_POST['nama_petugas'];
    
        // Update data in database
        $update = mysqli_query($link, "UPDATE pinjaman SET
                                            id_pinjaman = '$nama',
                                            nama_anggota = '$produk',
                                            nama_angsuran = '$stok',
                                            nama_petugas = '$stok2'
                                            WHERE id = '$id'");
    
        if($update){
            // Redirect to the view page after successful update
            header("Location: tampil.php");
            exit();
        } else {
            echo "<script>alert('Gagal mengupdate data.')</script>";
        }
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perbarui Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="shortcut icon" type="image/png" href="http://localhost/toko/myweb/keranjang.png">

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
<body style="background-image:url(../supplier/welcome.jpg); background-size:cover;">
    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Perbarui data</h2>
                    </div>
                    <ol class="breadcrumb">
                  
                  <li class="active">Silahkan edit data dengan data yang valid !!!</li>
              </ol>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                            <label>Kode pinjaman</label>
                            <input type="text" name="id_pinjaman" class="form-control" value="<?php echo $query['id_pinjaman']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Anggota</label>
                            <select name="nama_anggota" id="produk" class="form-control">
                                <?php
                                while ($identitas = mysqli_fetch_array($identitas_result)) {
                                    echo "<option value='".$identitas['nama']."'".(($query['nama_anggota'] == $identitas['nama'])? 'selected="selected"': '').">".$identitas['nama']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nama Angsuran</label>
                            <select name="nama_angsuran" id="produk" class="form-control">
                                <?php
                                while ($identitas = mysqli_fetch_array($identitas_result2)) {
                                    echo "<option value='".$identitas['angsuran']."'".(($query['nama_angsuran'] == $identitas['angsuran'])? 'selected="selected"': '').">".$identitas['angsuran']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                       
                       
                        <div class="form-group">
                            <label>Nama Petugas</label>
                            <select name="nama_petugas" id="produk" class="form-control">
                                <?php
                                while ($identitas = mysqli_fetch_array($identitas_result3)) {
                                    echo "<option value='".$identitas['username']."'".(($query['nama_petugas'] == $identitas['username'])? 'selected="selected"': '').">".$identitas['username']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                       
                        <br><br>
                       
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