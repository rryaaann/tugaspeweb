<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stok_produk";

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID produk dari URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Query untuk menghapus produk berdasarkan ID
    $sql = "DELETE FROM produk WHERE id_produk = $id_produk";

    if ($conn->query($sql) === TRUE) {
        // Redirect ke halaman dashboard jika berhasil dihapus
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID produk tidak valid atau tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>
