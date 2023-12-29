<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

// Enkripsi password menggunakan hash bcrypt
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo '<script>
            alert("User berhasil ditambahkan");
            window.location.href = "login.php";
          </script>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$stmt->close();
$conn->close();
?>
