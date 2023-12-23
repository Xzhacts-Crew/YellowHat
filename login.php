<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "password_manager";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari formulir login
$username = $_POST['username'];
$password = $_POST['password'];

// Query untuk mencari user berdasarkan username
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = $conn->query($sql);

// Periksa apakah data ditemukan
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifikasi password menggunakan password_verify
    if (password_verify($password, $row['password'])) {
        // Password valid, set session dan arahkan ke halaman dashboard
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard1.php");
    } else {
        // Password tidak valid, arahkan kembali ke halaman login
        header("Location: index.html");
    }
} else {
    // Data tidak ditemukan, arahkan kembali ke halaman login
    header("Location: index.html");
}

// Tutup koneksi
$conn->close();
?>
