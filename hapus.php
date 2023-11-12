<?php

// if user have not login, then throw user to login.php
if(!isset($_SESSION['login'])){
	header('Location: login.php');
	exit;
}

require 'functions.php';
$id = $_GET['id'];

if(hapus($id) > 0){
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href='index.php';
        </script>";
    } else {
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href='index.php';
        </script>";
};

?>