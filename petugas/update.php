

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
$query = query("SELECT * FROM petugas WHERE id = '$id'")[0];


if(isset($_POST['kirim'])){
    $username = $_POST['username'];   
    $password =$_POST['password'];
    $namalkp = $_POST['nama_lengkap'];
    $contact = $_POST['contact'];
    $pejabat = $_POST['level'];
   

  
    $insert= mysqli_query($link, "UPDATE petugas SET
                                    username = '$username' ,
                                    password = '$password' ,
                                    nama_lengkap = '$namalkp' ,
                                    contact = '$contact' ,
                                    level = '$pejabat' 
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
                           
                        <label>username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $query['username']; ?>">
                        </div>  
                        <div>
                        <label>password</label>
                            <input type="text" name="password" class="form-control" value="<?php echo $query['password']; ?>">
                        </div>
                        <div>
                        <label>nama lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $query['nama_lengkap']; ?>">
                        </div>
                        <div>
                        <label>contact</label>
                            <input type="number" name="contact" class="form-control" value="<?php echo $query['contact']; ?>">
                        </div>
                        <div>

                         
<label for="">Pejabat</label><br>
   <input type="radio" name="level" value="admin" id="nama" <?= ($query['level'] == 'admin')? "checked": ''?>>admin
   <input type="radio" name="level" value="petugas" id="nama" <?= ($query['level'] == 'petugas')? "checked": ''?>>petugas

</div>
                        <div>
                       
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit"/ class="btn btn-primary" value="perbarui" name="kirim">
                        <a href="tampil.php" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>