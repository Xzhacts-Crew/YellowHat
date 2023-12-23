<?php
include 'kunci.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "password_manager";

// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
$website = $_POST['website'];
$email = $_POST['email'];
$password = $_POST['password'];
$username = $_POST['username'];

// Dapatkan kunci enkripsi dari database (asumsikan kunci disimpan di kunci_tabel)
$keyQuery = "SELECT kunci FROM kunci_tabel WHERE username = '$username'";
$keyResult = $conn->query($keyQuery);

if ($keyResult->num_rows > 0) {
    $row = $keyResult->fetch_assoc();
    $encryptionKey = $row['kunci'];

    // Enkripsi password sebelum disimpan
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encryptedPassword = openssl_encrypt($password, 'aes-256-cbc', $encryptionKey, 0, $iv);

    // Masukkan data ke tabel passwords
    $sql = "INSERT INTO passwords (website, email, password, iv) VALUES ('$website', '$email', '$encryptedPassword', '$iv')";
    $result = $conn->query($sql);

    if ($result) {
        // Tutup koneksi
        $conn->close();

        // Alihkan ke halaman utama atau halaman sukses
        header("Location: dashboard1.php");
        exit();
    } else {
        echo "Gagal menambahkan data: " . $conn->error;
    }
} else {
    echo "Gagal mendapatkan kunci enkripsi.";
}

?>
