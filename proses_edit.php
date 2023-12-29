<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stok_produk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produk = $_POST['id_produk'];
    // Ambil nilai perubahan dari formulir
    $nama_produk = $_POST['nama_produk'];
    // Ambil perubahan lainnya sesuai dengan struktur tabel produk

    // Lakukan query untuk update data produk
    $sql = "UPDATE produk SET nama_produk='$nama_produk' WHERE id_produk=$id_produk";

    if ($conn->query($sql) === TRUE) {
        // Jika update berhasil, arahkan ke dashboard.php
        header("Location: dashboard.php");
        exit(); // Pastikan kode berhenti di sini setelah pengalihan header
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>