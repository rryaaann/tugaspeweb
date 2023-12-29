<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stok_produk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil ID produk dari URL
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Lakukan query untuk mengambil informasi produk yang sesuai dengan ID
    $sql = "SELECT * FROM produk WHERE id_produk = $id_produk";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Tampilkan formulir edit dengan informasi produk yang diambil dari database
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h2>Edit Produk</h2>
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id_produk" value="<?php echo $row['id_produk']; ?>">
        <label for="nama_produk">Nama Produk:</label>
        <input type="text" id="nama_produk" name="nama_produk" value="<?php echo $row['nama_produk']; ?>"><br><br>
        <!-- Tambahkan input lainnya sesuai dengan struktur tabel -->
        <label for="merek_produk">Merek Produk:</label>
        <input type="text" id="merek_produk" name="merek_produk" value="<?php echo $row['merek_produk']; ?>"><br><br>
        
        <label for="harga_produk">Harga Produk:</label>
        <input type="text" id="harga_produk" name="harga_produk" value="<?php echo $row['harga']; ?>"><br><br>
        
        <label for="stok_produk">Stok Produk:</label>
        <input type="text" id="stok_produk" name="stok_produk" value="<?php echo $row['stok']; ?>"><br><br>
        
        <label for="gambar_produk">Gambar Produk:</label>
        <input type="file" id="gambar_produk" name="gambar_produk"><br><br>
        
        <input type="submit" value="Simpan Perubahan">
    </form>
</body>
</html>
<?php
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID produk tidak valid.";
}
$conn->close();
?>
