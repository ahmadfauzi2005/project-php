<?php 
 
 session_start();
  
 if (!isset($_SESSION['nama'])) {
     header("Location:http://localhost/NYOBA/index.php");
 }
?>


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
$query = query("SELECT * FROM jenis_angsuran WHERE id = '$id'")[0];




if(isset($_POST['kirim'])){
    $id_jenis = $_POST['id_jenis'];
    $jenis = $_POST['jenis'];
   
    
    // Cek apakah id_jenis sudah ada di dalam database
    $cek_id = mysqli_query($link, "SELECT * FROM jenis_angsuran WHERE id_jenis='$id_jenis'");
    if(mysqli_num_rows($cek_id) > 0){
        echo "<script>alert('ID jenis sudah digunakan');
        document.location.href= 'create.php'; </script>";
    }

  
    $insert= mysqli_query($link, "UPDATE jenis_angsuran SET
                                    id_jenis = '$id_jenis' ,
                                    jenis = '$jenis' 
                                   
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
    <title>Perbarui Data</title>
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
<body style="background-image:url(../supplier/welcome.jpg); background-size:cover;">
    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Perbarui data</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post" enctype="multipart/form-data">
                        
                        <div class="form-group <?php echo (!empty($nama_err)) ? 'has-error' : ''; ?>">
                           
                        <label>id jenis</label>
                            <input type="text" name="id_jenis" class="form-control" value="<?php echo $query['id_jenis']; ?>">
                        </div>
                        <div>
                        <label>Jenis</label>
                            <input type="text" name="jenis" class="form-control" value="<?php echo $query['jenis']; ?>">
                        </div>
                        
                        <div>
                       
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