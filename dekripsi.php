<?php
include 'kunci.php';
// Fungsi untuk mendekripsi password

function decryptPassword($encryptedPassword, $encryptionKey, $iv) {
    $decryptedPassword = openssl_decrypt($encryptedPassword, 'aes-256-cbc', $encryptionKey, 0, $iv);
    return $decryptedPassword;
}

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

// Ambil data dari database
$sql = "SELECT * FROM passwords";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data dari setiap baris
    while($row = $result->fetch_assoc()) {
        $decryptedPassword = openssl_decrypt($row['password'], "aes-256-cbc", $encryptionKey, 0, $row['iv']);

        if ($decryptedPassword === false) {
            echo "Kesalahan dalam mendekripsi password.";
        } else {
            echo "<tr>";
        echo "<td>" . $row['website'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $decryptedPassword . "</td>";
        echo "</tr>";
        

        }
    }
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi
$conn->close();
?>