<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pkm";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection Failed " . $conn->connect_error);
}

if(isset($_POST['rekamMedis'])) { // Ubah dari 'username' menjadi 'rekamMedis'
    $nomor_rekam_medis = $_POST['rekamMedis']; // Ubah dari 'username' menjadi 'rekamMedis'

    // Query untuk memeriksa nomor rekam medis dalam database
    $query = "SELECT * FROM rekammedis WHERE noRekamMedis = '$nomor_rekam_medis'";
    $result = mysqli_query($conn, $query);

    // Jika nomor rekam medis ditemukan dalam database, arahkan ke dashboard
    if(mysqli_num_rows($result) > 0) {
        header("Location: dashboard.php"); // Ganti dashboard.php dengan halaman dashboard Anda
        exit();
    } else {
        // Jika nomor rekam medis tidak ditemukan, kembali ke halaman login dengan pesan kesalahan
        header("Location: login.php?error=not_registered"); // Ganti login.php dengan halaman login Anda
        exit();
    }
}

$conn->close();
?>
