<?php 
 
 session_start();
  
 if (!isset($_SESSION['nama'])) {
     header("Location:http://localhost/NYOBA/index.php");
 }
?>


<?php
// Include config file
require_once "config.php";


$identitas_result = mysqli_query($link, "SELECT * FROM jenis_angsuran");


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
$query = query("SELECT * FROM angsuran WHERE id = '$id'")[0];




if(isset($_POST['kirim'])){
    $angsuran = $_POST['angsuran'];
    $jenis = $_POST['jenis'];
   

  
    $insert= mysqli_query($link, "UPDATE angsuran SET
                                    angsuran = '$angsuran' ,
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
                           
                        <label>Angsuran</label>
                            <input type="text" name="angsuran" class="form-control" value="<?php echo $query['angsuran']; ?>">
                        </div>
                        <div>
                        <label>Jenis</label>
                        <select name="jenis" id="produk" class="form-control">
                                <?php
                                while ($identitas = mysqli_fetch_array($identitas_result)) {
                                    echo "<option value='".$identitas['jenis']."'".(($query['jenis'] == $identitas['jenis'])? 'selected="selected"': '').">".$identitas['jenis']."</option>";
                                }
                                ?>
                            </select>
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