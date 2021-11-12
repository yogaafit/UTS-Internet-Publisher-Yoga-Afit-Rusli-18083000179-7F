<?php
session_start();
if(empty($_SESSION['username']) or empty($_SESSION['level'])){
    echo "<script>alert('maaf untuk mengakses halaman ini anda harus login 
    terlebih dahulu, terima kasih.');document.location='index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Home Administrator</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap CSS -->
</head>
<body>
    <div class="container">
        <!-- Akhir Jumbotron -->
        <div class="jumbotron bg-primary text-white mb-3 p-3">
            <h1 class="display-4">Hello, <b><?= $_SESSION['nama_lengkap'] ?></b></h1>
            <p class="lead">Selamat datang, anda berhasil login sebagai 
            <b><?= $_SESSION['username']?></b></p>
            <hr class="my-4">
            <a class="btn btn-danger btn-lg" href="logout.php" 
            role="button">Logout</a>
        </div>
        <!-- Penutup Jumbotron -->

        <!-- Awal Card -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                Ganti password!! <i>('abaikan jika tidak ingin mengganti password')</i>
            </div>
            <div class="card-body">
            <form method="POST" action="ganti_password.php">
                <input type="hidden" name="username" value="<?=$_SESSION
                ['username']?>">
                <div class="form-group">
                    <label>Masukkan password lama anda!....</label>
                    <input type="text" class="form-control" name="pass_lama"
                    required>
                </div>
                <div class="form-group">
                    <label>Masukkan password baru anda!....</label>
                    <input type="password" class="form-control" name="pass_baru"
                    required>
                </div>
                <div class="form-group">
                    <label>Konfirmasi sekali lagi password baru anda!...</label>
                    <input type="password" class="form-control" name="konfirmasi_pass"
                    required>
                </div>
                <button type="submit" class="btn btn-primary">Proses</button>
                <button type="reset" class="btn btn-danger">Batal</button>
             </form>
            </div>
        </div>
        <!-- Akhir Card -->

        <!-- Penutup Container -->
    </div>
</body>
</html>