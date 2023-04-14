<?php 
 
 session_start();
  
 if (!isset($_SESSION['nama'])) {
     header("Location:http://localhost/nyoba/index.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><h1>KOPERASI</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/gambar/tampil.php">Anggota</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/petugas/tampil.php">Petugas</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/jenis/tampil.php">Jenis angsuran</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/angsuran/tampil.php">Angsuran</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/pinjaman/tampil.php">Pinjaman</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/nyoba/index.php">Logout</a></li>
                    </ul>
                </div> 
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome To Koperasi!</div>
                <div class="masthead-heading text-uppercase">Koperasi Pinjaman</div>
               
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
