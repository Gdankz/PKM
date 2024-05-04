<?php
session_start(); // Mulai session untuk mengakses data sesi

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pkm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}

if(isset($_POST['rekamMedis'])) {
    $nomor_rekam_medis = $_POST['rekamMedis'];

    // Query untuk memeriksa nomor rekam medis dalam database
    $query = "SELECT * FROM rekammedis WHERE noRekamMedis = '$nomor_rekam_medis'";
    $result = mysqli_query($conn, $query);

    // Jika nomor rekam medis ditemukan dalam database
    if(mysqli_num_rows($result) > 0) {
        // Set session dengan nomor rekam medis
        $_SESSION['username'] = $nomor_rekam_medis;
        header("Location: dashboard.php"); // Arahkan ke dashboard
        exit();
    } else {
        // Jika nomor rekam medis tidak ditemukan, kembali ke halaman login dengan pesan kesalahan
        header("Location: login.php?error=not_registered"); // Ganti login.php dengan halaman login Anda
        exit();
    }
}

$conn->close();
?>
