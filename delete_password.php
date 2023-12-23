<?php
// delete_process.php
include 'config.php';

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

if (isset($_POST['delete_submit'])) {
    // Pastikan koneksi database sudah ada
    include 'config.php';

    // Sanitasi data dan dapatkan ID yang akan dihapus
    $delete_id = mysqli_real_escape_string($conn, $_POST['delete_id']);

    // Query untuk menghapus data
    $delete_query = "DELETE FROM passwords WHERE id = '$delete_id'";
    $delete_result = $conn->query($delete_query);

    if ($delete_result) {
        header("Location: dashboard1.php");
    } else {
        header("Location: dashboard1.php");
    }

    // Tutup koneksi
    $conn->close();
}
?>
