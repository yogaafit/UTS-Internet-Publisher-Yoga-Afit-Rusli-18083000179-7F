<?php

//panggil koneksi
include "koneksi.php";

$pass = md5($_POST['password']);
$username = mysqli_escape_string($koneksi, $_POST['username']);
$password = mysqli_escape_string($koneksi, $pass);
$level = mysqli_escape_string($koneksi, $_POST['level']);

//cek useename
$cek_user = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username = '$username' and level='$level' ");
$user_valid = mysqli_fetch_array($cek_user);
//uji username
if($user_valid){
    //terdaftar
    //cek pass
    if($password == $user_valid['password']) {
        //pass sesuai
        //buat session
        session_start();
        $_SESSION['username'] = $user_valid['username'];
        $_SESSION['nama_lengkap'] = $user_valid['nama_lengkap'];
        $_SESSION['level'] = $user_valid['level'];

        //uji level
        if($level == "Pegawai"){
            header('location:home_pegawai.php');
        } elseif($level == "Operator"){
            header('location:home_operator.php');
        } elseif($level == "Administrator"){
            header('location:home_admin.php');
        }
    }else{
        echo "<script>alert('maaf, Login Gagal, Password anda tidak sesuai!'); document.location='index.php'</script>";
    }
} else{
    echo "<script>alert('maaf, Login Gagal, Username anda tidak terdaftar!'); document.location='index.php'</script>";
}
?>