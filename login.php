<?php
session_start();
include "config/koneksi.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username']=$username;
        header("location:starter.php");
    }else{
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>

<style>

body{
    margin:0;
    padding:0;
    font-family: Arial, Helvetica, sans-serif;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#6a11cb,#2575fc);
}

.login-box{
    background:white;
    padding:40px;
    border-radius:12px;
    width:320px;
    box-shadow:0 10px 25px rgba(0,0,0,0.2);
    text-align:center;
}

.login-box h2{
    margin-bottom:20px;
}

input{
    width:100%;
    padding:10px;
    margin:10px 0;
    border-radius:8px;
    border:1px solid #ccc;
    font-size:14px;
}

input:focus{
    outline:none;
    border:1px solid #2575fc;
}

button{
    width:100%;
    padding:10px;
    border:none;
    border-radius:8px;
    background:#2575fc;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    background:#6a11cb;
}

</style>

</head>
<body>

<div class="login-box">

<h2>LOGIN</h2>

<form method="POST">

<input type="text" name="username" placeholder="Masukkan Username">

<input type="password" name="password" placeholder="Masukkan Password">

<button type="submit" name="login">Login</button>

</form>

</div>

</body>
</html>