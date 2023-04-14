<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
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
<body>
    <form action="proses.php" method="post" enctype="multipart/form-data">
       
  
      <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Tambahkan Data Siswa</h2>
                    </div>
                    <p>isi kan from dengan data yang sebenarnya</p>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">

                        </div>
                        
                        <div>
                            <label for="">kelas</label>
                            <select name="kelas" id="kelas">
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            
                        </div>
                        <div>
                            <label for="image">Select Image:</label>
                            <input type="file" name="image" id="image">
                           
                        </div>
                        <div>
                        <label for="">jenis kelamin</label><br>
                        <input type="radio" name="kelamin" id="kelamin" value="laki-laki"  checked='checked'>laki-laki
                        <input type="radio" name="kelamin" id="kelamin" value="perempuan" >perempuan
                        
                        <br><br>
                        <input type="submit" class="btn btn-primary" value="Upload Image">
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