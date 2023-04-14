<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <style type="text/css">
        .wrapper{
            width: 900px;
            margin: 0 auto;
            margin-top:10%;
            padding: 3%
        }
        .page-header h2{
            margin-top: 0;
        }
        table tr td:last-child a{
            margin-right: 15px;
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body style="background-image:url(../gambar/20221220_080155-edit-20221225114350.jpg); background-size:cover;">

    <div class="wrapper" style="background-color:white;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Data Anggota</h2>
    <a href="create.php" class="btn btn-success pull-right">Tambah Baru</a>
                    </div>
                    <button class="btn btn-warning"><a href="http://localhost/nyoba/dashboard.php">kembali ke menu</a></button>
                <br>
                <br>
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM indentitas";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                   
                                        echo "<th>Nama Anggota</th>";
                                        echo "<th>Jenis kelamin</th>";
                                        echo "<th>foto</th>";
                                        echo "<th>No telephone</th>";
                                        echo "<th>Tanggal lahir</th>";
                                      
                                        echo "<th>aksi</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                             echo "<td>" . $row['nama'] . "</td>";
                                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                                        echo '<td> <img  src= "source/' . $row['name'] . '" width="100" alt=""></td>';
                                        echo "<td>" . $row['no'] . "</td>";
                                        echo "<td>" . date('d-m-Y', strtotime($row['tgl'])) . "</td>";

                                        echo "<td>";
                                           
                                            echo "  <a class='btn btn-primary' href='update.php?id=". $row['id'] ."' title='Edit' data-toggle='tooltip'><span>edit</span></a>";
                                            echo "<a class='btn btn-danger' href='delete.php?id=". $row['id'] ."' title='Hapus' data-toggle='tooltip'><span >hapus</span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>Data kosong!!</em></p>";
                        }
                    } else{
                        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                    }

                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>