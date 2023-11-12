<?php

// if user have not login, then throw user to login.php
session_start();
if(!isset($_SESSION['login'])){
    header('Location : login.php');
    exit();
}

require('functions.php');
$contacts = query("SELECT * FROM kontak");

if (isset($_POST['cari'])){
    $contacts = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Contact App</title>
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
            </ul>
            <form class="d-flex" role="search" method="post">
                <input name="keyword" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" autofocus>
                <button class="btn btn-outline-dark" type="submit" name="cari">Search</button>
            </form>
            <a href="logout.php" class="text-decoration-none text-black ps-3">Logout</a>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
    <div class="container mt-3">
        <h2 class="display-5">Contacts</h2>
        <a href="tambah.php" class="btn btn-primary">Tambah Kontak</a>
        <table class="table table-striped mt-3">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>

            <?php $i = 1;?>
            <?php foreach ($contacts as $contact) :?>
            <tr>
                <td><?= $i;?></td>
                <td><?= $contact['nama']?></td>
                <td><?= $contact['email']?></td>
                <td><?= $contact['nohp']?></td>
                <td>
                    <a href="hapus.php?id=<?= $contact['id'] ?>" class="btn btn-danger badge">Hapus</a>
                    <a href="edit-kontak.php?id=<?= $contact['id'] ?>" " class="btn btn-success badge">Edit</a>
                </td>
            </tr>
            <?php $i++;?>
            <?php endforeach;?>
        </table>
    </div>
</body>
</html>