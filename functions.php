<?php
// connect to db
$conn = mysqli_connect("localhost", "root", "", "db_kontak");

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows=[];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[]=$row;
    }
    return $rows;
}


// function tambah data
function tambah($data){
    global $conn;

    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $nohp = htmlspecialchars($data['nohp']);

    $query= "INSERT INTO kontak 
            VALUES('', '$nama', '$email', '$nohp')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
};

// function hapus kontak
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM kontak WHERE id = '$id'");
    return mysqli_affected_rows($conn);
};


// function edit kontak
function edit($data){
    global $conn;

    $id = $data['id'];
    $nama = htmlspecialchars($data['nama']);
    $email = htmlspecialchars($data['email']);
    $nohp = htmlspecialchars($data['nohp']);

    $query= "UPDATE kontak SET
            nama = '$nama',
            email = '$email',
            nohp = '$nohp'
            WHERE id = '$id'
            ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
};


// function cari kontak
function cari($keyword){
    $query = "SELECT * FROM kontak WHERE nama LIKE '%$keyword%' OR
                                            email LIKE '%$keyword%' OR 
                                            nohp LIKE '%$keyword%'";
    return query($query);
}

// function registrasi
function registrasi($data){

    global $conn;

    $username = strtolower(stripcslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // confirm if username already exist
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'"); 

    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Username already used!');
            </script>
            ";
        return false;
    }

    // confirm password
    if( $password !== $password2 ){
        echo "
            <script>
                alert('Konfirmasi password tidak sesuai!');
            </script>
            ";
        return false; 
    }

    // encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // insert data
    mysqli_query($conn, "INSERT INTO users VALUES ('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}

?> 