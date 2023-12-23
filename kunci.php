<?php
// Informasi koneksi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "password_manager";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Definisikan nilai $username (gantilah dengan nilai yang sesuai)
$username = 'username';

// Query untuk mengambil kunci enkripsi dari tabel
$sql = "SELECT kunci FROM users WHERE username = '$username'";

$result = $conn->query($sql);

if ($result) {
    // Memeriksa apakah baris hasil query lebih dari 0
    if ($result->num_rows > 0) {
        // Mengambil baris pertama dari hasil query
        $row = $result->fetch_assoc();

        // Mengisi variabel $encryptionKey dengan nilai kunci enkripsi dari database
        $encryptionKey = $row['kunci'];

        // Sekarang $encryptionKey berisi kunci enkripsi dari tabel database
        echo "Kunci enkripsi dari database: " . $encryptionKey;
    } else {
        echo "Tidak ada data kunci enkripsi ditemukan";
    }
} else {
    echo "Error dalam menjalankan query: " . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
