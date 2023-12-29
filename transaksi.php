<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Produk</title>
</head>
<body>
    <h2>Formulir Transaksi</h2>
    <form action="proses_transaksi.php" method="post">
        <label for="id_produk">ID Produk:</label>
        <input type="text" id="id_produk" name="id_produk"><br><br>

        <label for="tanggal_transaksi">Tanggal Transaksi:</label>
        <input type="text" id="tanggal_transaksi" name="tanggal_transaksi" readonly><br><br>

        <label for="jumlah_produk">Jumlah Produk:</label>
        <input type="text" id="jumlah_produk" name="jumlah_produk"><br><br>

        <label for="total_harga">Total Harga:</label>
        <input type="text" id="total_harga" name="total_harga" readonly><br><br>

        <label for="metode_pembayaran">Metode Pembayaran:</label>
        <input type="text" id="metode_pembayaran" name="metode_pembayaran"><br><br>

        <input type="submit" value="Proses Transaksi">
    </form>

    <script>
        document.getElementById('tanggal_transaksi').value = new Date().toISOString().slice(0, 10);
        
        document.getElementById('jumlah_produk').addEventListener('input', function() {
            let hargaProduk = 10; // Ganti dengan harga produk yang sesuai dari database
            let jumlah = parseInt(document.getElementById('jumlah_produk').value);
            document.getElementById('total_harga').value = (hargaProduk * jumlah).toFixed(2);
        });
    </script>
</body>
</html>
