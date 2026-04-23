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
<title>Login</title>

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
    background:linear-gradient(135deg,#6a11cb,#2575fc);
}

.container{
    display:flex;
    width:800px;
    height:450px;
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,0.3);
    animation:fadeIn 1s ease;
}

.left{
    width:50%;
    background:url('https://img.freepik.com/free-vector/login-concept-illustration_114360-739.jpg') no-repeat center;
    background-size:cover;
}

.right{
    width:50%;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.right h2{
    margin-bottom:20px;
}

.input-group{
    width:100%;
    margin:10px 0;
}

.input-group input{
    width:100%;
    padding:12px;
    border-radius:8px;
    border:1px solid #a91616;
    outline:none;
    transition:0.3s;
}

.input-group input:focus{
    border-color:#2575fc;
    box-shadow:0 0 5px rgba(0,0,0,0.5);
}

button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#2575fc;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
    margin-top:10px;
}

button:hover{
    background:#6a11cb;
    transform:scale(1.05);
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

@media(max-width:768px){
    .container{
        flex-direction:column;
        width:90%;
        height:auto;
    }

    .left{
        width:100%;
        height:200px;
    }

    .right{
        width:100%;
    }
}

</style>
</head>

<body>

<div class="container">

    <div class="left"></div>

    <div class="right">
        <h2>Welcome</h2>

        <form method="POST">

            <div class="input-group">
                <input type="text" name="username" placeholder="Username" required>
            </div>

            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit" name="login">Login</button>

        </form>
    </div>

</div>

</body>
</html>