<?php 

// Panggil koneksi database
include "koneksi.php";

// Enkripsi inputan password lama
$password_lama=md5($_POST['pass_lama']);

// panggil inputan username
$username = $_POST['username'];

// uji password lama
$tampil = mysqli_query($koneksi, "SELECT * FROM tuser WHERE 
username = '$username' and password = '$password_lama'");
$data = mysqli_fetch_array($tampil);
// Jika data ditemuka, maka password sesai
if ($data) {
    // uji jika password baru dan password lama sama 
    $password_baru = $_POST ['pass_baru'];
    $$konfirmasi_password = $_POST ['konfirmasi_pass'];

    if ($password_baru == $konfirmasi_password) {
        // ganti password
        // enkripsi password baru
        $pass_ok = md5($konfirmasi_password);
        $ubah = mysqli_query($koneksi, "UPDATE tuser set password =
        '$pass_ok' WHERE id = '$data[id]' ");

        if ($ubah) {
            echo "<script>alert('Maaf, password anda telah berhasil diubah 
            silahkan logout untuk menguji password baru yang telah anda tetapkan.
            !!'); document.location='home_admin.php'</script>"; 
        }
    } else {
        echo "<script>alert('maaf,  Password baru dan konfirmasinya tidak sesuai
        .Silahkan input lagi dengan sesuai!'); document.location='home_admin.php'</script>";
    }
} else {
    echo "<script>alert('maaf,  Password lama anda tidak sesuai
    atau tidak terdaftar!'); document.location='home_admin.php'</script>";
}
 


?>