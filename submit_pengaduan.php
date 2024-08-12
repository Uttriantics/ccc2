<?php
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

// Menerima data dari formulir
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$kategori = $_POST['kategori'];
$deskripsi = $_POST['deskripsi'];
$bukti = $_FILES['bukti']['name'];
$bukti_tmp = $_FILES['bukti']['tmp_name'];
$upload_dir = 'uploads/';

// Menyimpan file bukti jika ada
if ($bukti) {
    move_uploaded_file($bukti_tmp, $upload_dir . $bukti);
}

// Menyimpan data ke basis data
$sql = "INSERT INTO pengaduan (nama, email, telepon, alamat, kategori, deskripsi, bukti)
VALUES ('$nama', '$email', '$telepon', '$alamat', '$kategori', '$deskripsi', '$bukti')";

if ($conn->query($sql) === TRUE) {
    echo "Pengaduan berhasil dikirim!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
