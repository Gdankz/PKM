<?php
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

// Memeriksa apakah data dikirim dari form
if (isset($_POST['rekamMedis']) && isset($_POST['nama'])) {
    $nomor_rekam_medis = $_POST['rekamMedis'];
    $nama_pasien = $_POST['nama'];

    // Query untuk memeriksa apakah nomor rekam medis sudah ada dalam database
    $cek_nomor_rekam = "SELECT * FROM rekammedis WHERE noRekamMedis='$nomor_rekam_medis'";
    $result = $conn->query($cek_nomor_rekam);

    // Jika nomor rekam medis sudah ada dalam database, tampilkan pesan kesalahan
    if ($result->num_rows > 0) {
        header("Location: buatAkun.php?error=nomor_rekam_sudah_ada");
        exit();
    } else {
        // Jika nomor rekam medis belum ada dalam database, tambahkan data ke database
        $sql = "INSERT INTO rekammedis (noRekamMedis, nama) VALUES ('$nomor_rekam_medis', '$nama_pasien')";

        if ($conn->query($sql) === TRUE) {
            header("Location: Login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>
