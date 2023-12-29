<?php
session_start();

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

$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>
                alert('Password salah');
                window.location.href = 'login.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('Username tidak ditemukan');
            window.location.href = 'login.php';
          </script>";
    exit();
}

$stmt->close();
$conn->close();
?>
