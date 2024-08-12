<?php
session_start();

// Memeriksa apakah admin telah login
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit();
}

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Membuat koneksi ke basis data
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data pengaduan
$sql = "SELECT * FROM pengaduan";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengaduan</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Data Pengaduan</h1>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Bukti</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['nama']."</td>
                        <td>".$row['email']."</td>
                        <td>".$row['telepon']."</td>
                        <td>".$row['alamat']."</td>
                        <td>".$row['kategori']."</td>
                        <td>".$row['deskripsi']."</td>
                        <td><a href='uploads/".$row['bukti']."'>Download</a></td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data pengaduan</td></tr>";
        }
        ?>
    </table>
    <a href="admin_logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>
