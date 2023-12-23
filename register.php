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

// Ambil data dari formulir registrasi
$username = $_POST['username'];
$password = $_POST['password'];
$kunci = $_POST['kunci'];

// Hash password dan kunci sebelum menyimpan ke database
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Buat nama tabel unik berdasarkan username
$userDataTable = "user_data_" . strtolower($username);

// Query untuk menambahkan pengguna baru
$sqlCreateUserTable = "CREATE TABLE $userDataTable (
    id INT PRIMARY KEY AUTO_INCREMENT,
    website VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    iv VARCHAR(255)
)";

$sqlInsertUser = "INSERT INTO users (username, password, kunci, user_data_table) VALUES ('$username', '$hashedPassword', '$kunci', '$userDataTable')";

// Mulai transaksi
$conn->begin_transaction();

// Buat tabel pengguna
$resultCreateUserTable = $conn->query($sqlCreateUserTable);

// Jika pembuatan tabel berhasil, tambahkan pengguna
if ($resultCreateUserTable) {
    $resultInsertUser = $conn->query($sqlInsertUser);

    if ($resultInsertUser) {
        // Registrasi berhasil, commit transaksi
        $conn->commit();
        header("Location: index.html");
    } else {
        // Gagal menambahkan pengguna, rollback transaksi
        $conn->rollback();
        echo "Gagal registrasi: " . $conn->error;
        header("Location: register.html");
    }
} else {
    // Gagal membuat tabel pengguna, rollback transaksi
    $conn->rollback();
    echo "Gagal membuat tabel pengguna: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
