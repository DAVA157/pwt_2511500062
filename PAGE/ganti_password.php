<?php
include "config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("Location:login.php");
    exit;
}

$username = $_SESSION['username'];

if (isset($_POST['simpan'])) {

    $password_baru = $_POST['password_baru'];

    $update = mysqli_query($conn, "
        UPDATE admin
        SET password='$password_baru'
        WHERE username='$username'
    ");

    if ($update) {
        echo "<script>
            alert('Password berhasil diganti');
            window.location='starter.php';
        </script>";
    } else {
        echo "Gagal : " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Ganti Password</title>
</head>
<body>

<form method="POST">
    <h2>Ganti Password</h2>
    <input type="password" name="password_baru" placeholder="Password Baru" required>
    <button type="submit" name="simpan">Simpan</button>
</form>

</body>
</html>