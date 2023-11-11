<?php

require "functions.php";

if(isset($_POST['register'])){
    if(registrasi($_POST) > 0){
        echo "
            <script>
            alert('Contact baru berhasil ditambahkan!');
            </script>
            ";
    }else{
        mysqli_error($conn);
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
    <title>Halaman Registrasi</title>
</head>
<body>
    <section class="vh-100 bg-info">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius:1rem;">
                        <div class="card-body text-center p-5">
                            <form action="" method="post">
                                <h3 class="mb-5">Sign Up</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="register">Register</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>