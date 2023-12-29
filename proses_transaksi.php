<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "stok_produk";

    // Buat koneksi ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $id_produk = $_POST['id_produk'];
    $tanggal_transaksi = date('Y-m-d'); // Menggunakan tanggal saat ini
    $jumlah_produk = $_POST['jumlah_produk'];

    // Mengambil harga produk dari database sesuai dengan id_produk
    $sql_get_price = "SELECT harga FROM produk WHERE id_produk = ?";
    $stmt_price = $conn->prepare($sql_get_price);
    $stmt_price->bind_param("i", $id_produk);
    $stmt_price->execute();
    $result_price = $stmt_price->get_result();
    $row_price = $result_price->fetch_assoc();

    if ($row_price) {
        $harga_produk = $row_price['harga'];
        $total_harga = $harga_produk * $jumlah_produk;

        // Simpan transaksi ke dalam database
        $sql_insert_transaksi = "INSERT INTO transaksi_produk (id_produk, tanggal_transaksi, jumlah_produk, total_harga, metode_pembayaran) 
                                VALUES (?, ?, ?, ?, ?)";
        $stmt_insert_transaksi = $conn->prepare($sql_insert_transaksi);
        $stmt_insert_transaksi->bind_param("isids", $id_produk, $tanggal_transaksi, $jumlah_produk, $total_harga, $_POST['metode_pembayaran']);

        if ($stmt_insert_transaksi->execute()) {
            // Redirect ke dashboard.php dengan alert setelah 3 detik
            echo "<script>
                setTimeout(function(){
                    window.location.href = 'dashboard.php';
                    alert('Transaksi berhasil! Total harga: $total_harga | Tanggal beli: $tanggal_transaksi');
                }, 3000); // Tampilkan pop-up selama 3 detik
            </script>";
        } else {
            echo "Error: " . $sql_insert_transaksi . "<br>" . $conn->error;
        }
        $stmt_insert_transaksi->close();
    } else {
        echo "Error: Produk tidak ditemukan.";
    }

    // Tutup statement dan koneksi
    $stmt_price->close();
    $conn->close();
}
?>
