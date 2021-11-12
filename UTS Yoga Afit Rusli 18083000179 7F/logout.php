<?php 
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['nama_lengkap']);
unset($_SESSION['lengkap']);

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman Administrator');
location='index.php'</script>";
?>