<?php
session_start(); // Mulai session untuk mengakses data sesi

// Periksa apakah pengguna sudah login
if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pkm";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pengguna dari database berdasarkan nomor rekam medis
$nomor_rekam_medis = $_SESSION['username'];
$query = "SELECT * FROM rekammedis WHERE noRekamMedis = '$nomor_rekam_medis'";
$result = $conn->query($query);

// Memeriksa apakah query berhasil
if ($result === false) {
    die("Error: " . $conn->error);
}

// Memeriksa apakah data ditemukan
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama = $row['nama'];
    $noRekamMedis = $row['noRekamMedis'];
}
else {
    // Jika data tidak ditemukan, logout pengguna dan arahkan ke halaman login
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <title>Login SIPAIR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </script>
</head>
<body>
<div class="container-fluid"></div>
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header text-center">
                <img src="logo%20pkm-kc.png" alt="SIPAIR LOGO" >
                <h5 class="card-title mt-2">Selamat Datang </h5>
                <h5 class="card-title mt-2"><?php echo "Nama : ". $nama; ?></h5>
                <h5 class="card-title mt-2"><?php echo "No Rekam Medis : ". $noRekamMedis; ?></h5>
            </div>
            <div class="card-body text-center">
                <a href="MonitoringRealtime.php" class="btn btn-info">Monitoring Realtime</a><br>
                <br>
                <a href="LihatRiwayat.php" class="btn btn-info">Lihat Riwayat</a>
                <br>
                <br>
                <a href="Login.php" class="btn btn-danger">Logout</a>

</body>
</html>
