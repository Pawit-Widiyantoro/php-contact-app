<?php

session_start();

// if user already login, user cannot access login.php
if(isset($_SESSION['login'])){
    header('Location: index.php');
    exit;
}
require "functions.php";

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])){
            // set session
            $_SESSION['login'] = true;

            header('Location: index.php');
            exit();
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Halaman Login</title>
</head>
<body>
    <section class="vh-100 bg-info">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius:1rem;">
                        <div class="card-body text-center p-5">
                            <form action="" method="post">
                                <h3 class="mb-5">Sign In</h3>
                                <div class="form-outline mb-4">
                                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                                <!-- remember me checkbox -->
                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input type="checkbox" name="remember" class="form-check-input border-3">
                                    <label for="remember" class="form-check-label ms-2">Remember Me</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                                <div class="mt-3">
                                    <?php if(isset($error)) : ?>
                                        <p style="color:red;font-style:italic;">Username atau Password salah!</p>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>