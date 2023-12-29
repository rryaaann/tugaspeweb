<!DOCTYPE html>
<html>
<head>
    <title>Form Tambah Produk</title>
</head>
<body>

<h2>Form Tambah Produk</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <label for="nama_produk">Nama Produk:</label>
    <input type="text" id="nama_produk" name="nama_produk"><br><br>
  
    <label for="merek_produk">Merek Produk:</label>
    <input type="text" id="merek_produk" name="merek_produk"><br><br>
  
    <label for="harga_produk">Harga Produk:</label>
    <input type="text" id="harga_produk" name="harga_produk"><br><br>
  
    <label for="stok_produk">Stok Produk:</label>
    <input type="text" id="stok_produk" name="stok_produk"><br><br>
  
    <label for="gambar_produk">Gambar Produk:</label>
    <input type="file" id="gambar_produk" name="gambar_produk"><br><br>

    <label for="nama_kategori">Nama Kategori:</label>
    <input type="text" id="nama_kategori" name="nama_kategori"><br><br>

    <input type="submit" value="Tambah Produk">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost"; // Ganti dengan nama server database Anda
    $username = "root"; // Ganti dengan username Anda
    $password = ""; // Ganti dengan password Anda
    $dbname = "stok_produk"; // Ganti dengan nama database Anda

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil nilai dari form
    $namaProduk = $_POST['nama_produk'];
    $merekProduk = $_POST['merek_produk'];
    $hargaProduk = $_POST['harga_produk'];
    $stokProduk = $_POST['stok_produk'];
    $gambarProduk = $_FILES['gambar_produk']['name']; // Nama gambar yang diupload
    $namaKategori = $_POST['nama_kategori']; // Ambil nilai nama_kategori

    // Lokasi penyimpanan gambar
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["gambar_produk"]["name"]);
    move_uploaded_file($_FILES["gambar_produk"]["tmp_name"], $target_file);

    // Query untuk memasukkan data ke dalam tabel kategori_produk
    $sqlKategori = "INSERT INTO kategori_produk (nama_kategori) VALUES ('$namaKategori')";
    if ($conn->query($sqlKategori) === TRUE) {
        $kategoriId = $conn->insert_id; // Dapatkan ID dari kategori yang baru saja dimasukkan

        // Query untuk memasukkan data ke dalam tabel produk
        $sqlProduk = "INSERT INTO produk (nama_produk, merek_produk, harga, stok, gambar_produk, kategori_id) 
            VALUES ('$namaProduk', '$merekProduk', '$hargaProduk', '$stokProduk', '$gambarProduk', '$kategoriId')";
        if ($conn->query($sqlProduk) === TRUE) {
            // Pesan jika query berhasil dieksekusi
            echo "Data produk berhasil ditambahkan ke dalam database!";
        } else {
            // Pesan jika terjadi kesalahan saat query produk dieksekusi
            echo "Error: " . $sqlProduk . "<br>" . $conn->error;
        }
    } else {
        // Pesan jika terjadi kesalahan saat query kategori dieksekusi
        echo "Error: " . $sqlKategori . "<br>" . $conn->error;
    }

    $conn->close();
}
?>







</body>
</html>
