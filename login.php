<?php
session_start();
include "config/koneksi.php";

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "
        SELECT * FROM admin 
        WHERE username='$username'
    ");

    $data = mysqli_fetch_array($query);

    if ($data) {

        if ($password == $data['password']) {

            $_SESSION['username'] = $data['username'];
            $_SESSION['level']    = $data['role'];

            // Jika password masih default
            if ($data['password'] == '1234') {

                header("Location:starter.php?page=ganti_password");

            } else {

                header("Location:starter.php");

            }

        } else {
            echo "<script>alert('Password salah');</script>";
        }

    } else {
        echo "<script>alert('Username tidak ditemukan');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Modern</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(120deg,#1e3c72,#2a5298);
}

/* Glass Card */
.card{
    width:350px;
    padding:30px;
    border-radius:20px;
    background:rgba(255,255,255,0.1);
    backdrop-filter:blur(15px);
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    color:white;
    text-align:center;
    animation:fadeIn 1s ease;
}

.card h2{
    margin-bottom:25px;
}

/* Floating Input */
.input-box{
    position:relative;
    margin-bottom:20px;
}

.input-box input{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    outline:none;
    background:rgba(255,255,255,0.2);
    color:white;
}

.input-box label{
    position:absolute;
    top:50%;
    left:12px;
    transform:translateY(-50%);
    color:#ddd;
    font-size:14px;
    pointer-events:none;
    transition:0.3s;
}

/* animasi label */
.input-box input:focus + label,
.input-box input:valid + label{
    top:-8px;
    font-size:12px;
    color:#fff;
}

/* Button */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#00c6ff;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#0072ff;
    transform:scale(1.05);
}

/* link */
.link{
    margin-top:15px;
    font-size:14px;
}

.link a{
    color:#fff;
    text-decoration:none;
}

.link a:hover{
    text-decoration:underline;
}

@keyframes fadeIn{
    from{
        opacity:0;
        transform:translateY(30px);
    }
    to{
        opacity:1;
        transform:translateY(0);
    }
}

</style>
</head>

<body>

<div class="card">
    <h2>Login</h2>

    <form method="POST">

        <div class="input-box">
            <input type="text" name="username" required>
            <label>Username</label>
        </div>

        <div class="input-box">
            <input type="password" name="password" required>
            <label>Password</label>
        </div>

        <button type="submit" name="login">Masuk</button>

        <div class="link">
            <p>Belum punya akun? <a href="#">Daftar</a></p>
        </div>

    </form>
</div>

</body>
</html>