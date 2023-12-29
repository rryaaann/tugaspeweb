<?php
$servername = "localhost"; // Atau sesuaikan dengan host Laragon Anda jika berbeda
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan kata sandi Anda jika ada
$dbname = "stok_produk"; // Ganti dengan nama database Anda

// Buat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
echo "Koneksi berhasil";
?>
