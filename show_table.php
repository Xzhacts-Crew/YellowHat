<?php
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

// Tampilkan data
if ($result->num_rows > 0) {
    // Menampilkan data di dalam tabel HTML
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['website'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['password'] . "</td>";
        
        echo "<td class='delete_table'>";
        echo "<form action='delete_password.php' method='post'>";
        echo "<input type='hidden' name='delete_id' value='" . $row['id'] . "'>";
        echo "<button type='submit' class='delete_button' name='delete_submit'>Delete</button>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
  
    }
} 

// Tutup koneksi
$conn->close();
?>
