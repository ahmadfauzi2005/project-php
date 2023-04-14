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
    <title>Document</title>
</head>
<body style="background-image:url(../gambar/20221220_080155-edit-20221225114350.jpg); background-size:cover;">
    <form action="proses.php" method="post" enctype="multipart/form-data">
       
  
      <div class="wrapper"  style="background-color:white;">
        <div class="container-fluid">
            <div class="card">
                    <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambahkan Data Aggota</h2>
                    </div>
                    <p>isi kan from dengan data yang sebenarnya</p>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                           
                        <div>
                        <label>Nama Anggota</label>
                            <input type="text" name="nama" id="nama" class="form-control" required>

                        </div><br>
                        
                        <div>
                            <label for="">jenis_kelamin</label><br>
                          <input type="radio" name="jenis_kelamin" value="laki-laki" required>laki-laki 
                          <input type="radio" name="jenis_kelamin" value="perempuan" required>perempuan 
                        </div><br>
                        <div>
                            <label for="image">Select Image:</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                        </div><br>
                        <div>
                        <label>No telephone</label>
                            <input type="number" name="no" id="nama" class="form-control" required>

                        </div><br>
                        <div>
                        <label>Tanggal lahir</label>
                            <input type="date" name="tgl" id="nama" class="form-control" required>
        
                        </div>
                        <div>
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Tambah data" name="kirim">
                        <a href="tampil.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
</body>
</html>    