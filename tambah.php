<?php
    require 'functions.php';
    
    if(isset($_POST['submit'])){
        if(tambah($_POST) > 0){
            echo "<script> 
                    alert('Data berhasil ditambahkan!');
                    document.location.href='index.php';
                </script>";
        }else{
        echo "<script> 
                alert('Data gagal ditambahkan!');
                document.location.href='index.php';
            </script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Tambah Data</title>
</head>
<body>
     <!-- navbar start -->
     <nav class="navbar navbar-expand-lg bg-body-secondary">
        <div class="container">
            <a class="navbar-brand" href="#">Zerolist</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li> -->
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autofocus>
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6">
                <h2 class="display-5">Tambah Kontak</h2>
                <form action="" method="post">
                    <ul class="list-unstyled">
                        <li class="form-group mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama" required autocomplete="off">
                        </li>
                        <li class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Masukkab Email" required autocomplete="off">
                        </li>
                        <li class="form-group mb-3">
                            <label for="nohp" class="form-label">No. HP</label>
                            <input type="text" name="nohp" id="nohp" class="form-control" placeholder="Masukkan No. HP" required autocomplete="off">
                        </li>
                        <li>
                            <button type="submit" name="submit" class="btn btn-primary">Tambah</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</body>
</html>