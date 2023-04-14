
<?php
include 'config.php';

$Anggota = mysqli_query($link, "SELECT * FROM indentitas");
$Angsuran = mysqli_query($link, "SELECT * FROM angsuran");
$Petugas = mysqli_query($link, "SELECT * FROM petugas");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
       .wrapper{
            width: 500px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 0%;
        }
        .row {
   display: flex;
   flex-wrap: wrap;
   margin-right: -15px;
   margin-left: -15px;
}

.col-md-12 {
   flex: 0 0 100%;
   max-width: 100%;
   padding-right: 15px;
   padding-left: 15px;
}
input[type="submit"]:hover, .btn:hover {
   background-color: #333;
   color: #fff;
}
.container-fluid {
   padding: 0 15px;
}

input[type="submit"], .btn {
   padding: 10px 20px;
}
form {
   margin-top: 20px;
}
.card {
  border: 10px solid #ccc;
  border-radius: 8px;
  box-shadow: 0 6px 9px rgba(0, 0, 0, 0.1);
  margin: 10px;
  max-width: 600px;
}

.card-body {
  padding: 20px;
}

.card-title {
  font-size: 20px;
  margin-bottom: 10px;
}

.card-text {
  margin-bottom: 5px;
}


.form-group {
   margin-bottom: 10px;
}
label {
   color: #333;
}
input[type="text"], input[type="number"], input[type="date"], textarea {
   border: 1px solid #ccc;
   padding: 8px;
}
.wrapper {
   background-color: #f2f2f2;
}
body {
   font-family: Arial, sans-serif;
   font-size: 14px;
}

h2 {
   font-size: 24px;
}

    </style>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
</head>
<body style="background-image:url(../supplier/welcome.jpg); background-size:cover;" >
    <form action="proses.php" method="post" enctype="multipart/form-data">
       
  
      <div class="wrapper"  style="background-color:white;">
        <div class="container-fluid">
        <div class="card">
                    <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambahkan Data pinjaman</h2>
                    </div>
                    <p>isi kan from dengan data yang valid</p>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                        <label> kode pinjaman</label>
                            <input type="text" name="id_pinjaman" id="id_pinjaman" placeholder="Masukkan kode pinjaman" class="form-control" required>

                        </div>
                        <div>
                        <label>nama anggota</label>
                        
                        <select name="nama_anggota" id="produk" class="form-control"required>
                        <option value="" disabled selected>Pilih anggota</option>
                        <?php
                                while ($identitas = mysqli_fetch_array($Anggota)) {
                                    echo "<option value='".$identitas['nama']."'> ".$identitas['nama']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                        <label>nama angsuran</label>
                        <select name="nama_angsuran" id="produk" class="form-control"required>
                        <option value="" disabled selected>Pilih Angsuran</option>
                        <?php
                                while ($identitas = mysqli_fetch_array($Angsuran)) {
                                    echo "<option value='".$identitas['angsuran']."'> ".$identitas['angsuran']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                        <label>nama petugas</label>
                        <select name="nama_petugas" id="produk" class="form-control"required>
                        <option value="" disabled selected>Pilih Petugas</option>
                        <?php
                                while ($identitas = mysqli_fetch_array($Petugas)) {
                                    echo "<option value='".$identitas['username']."'> ".$identitas['username']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Tambah data" name="kirim">
                        <a href="tampil.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>