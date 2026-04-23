<?php
include "config/koneksi.php";


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];


$query = mysqli_query($conn, "
    SELECT * FROM admin 
    WHERE username='$username'
");

$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Profile</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:#f4f6f9;
}

.container{
    width:90%;
    max-width:1100px;
    margin:30px auto;
}

.header{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    color:white;
    padding:25px;
    border-radius:15px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.profile{
    display:flex;
    align-items:center;
    gap:15px;
}

.profile img{
    width:55px;
    height:55px;
    border-radius:50%;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-top:25px;
}

.card{
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 8px 18px rgba(0,0,0,0.08);
}

.info{
    margin-top:25px;
    background:white;
    padding:25px;
    border-radius:15px;
    box-shadow:0 8px 18px rgba(0,0,0,0.08);
}

.info p{
    margin:10px 0;
}

</style>
</head>
<body>

<div class="container">

    <div class="header">
        <h2>Dashboard</h2>

        <div class="profile">
            <img src="https://i.imgur.com/6VBx3io.png">
            <div>
                <strong><?php echo $data['username']; ?></strong><br>
                <small><?php echo $data['role']; ?></small>
            </div>
        </div>
    </div>

    <div class="cards">

        <div class="card">
            <h3>Username</h3>
            <p><?php echo $data['username']; ?></p>
        </div>

        <div class="card">
            <h3>Role</h3>
            <p><?php echo $data['role']; ?></p>
        </div>

        <div class="card">
            <h3>Status</h3>
            <p>Aktif</p>
        </div>

        <div class="card">
            <h3>Keamanan</h3>
            <p>Password Aman</p>
        </div>

    </div>

    <div class="info">
        <h3>Informasi Profile</h3>

        <p>Username : <?php echo $data['username']; ?></p>
        <p>Role : <?php echo $data['role']; ?></p>
        <p>Password : <?php echo $data['password']; ?></p>

    </div>

</div>

</body>
</html>