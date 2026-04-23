<?php
include "config/koneksi.php";

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit;
}

/* Hitung data */
$jml_mapel = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mapel"));
$jml_guru  = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM guru"));
$jml_kelas = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM kelas"));
$jml_siswa = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard Sekolah</title>

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<link rel="stylesheet" href="dist/css/adminlte.min.css">

<style>

body{
    background:linear-gradient(135deg,#eef2f3,#dfe9f3);
    font-family:Arial,sans-serif;
}

.wrapper-box{
    width:95%;
    max-width:1250px;
    margin:auto;
    padding-top:30px;
}

.header-box{
    background:linear-gradient(135deg,#667eea,#764ba2);
    color:white;
    padding:30px;
    border-radius:18px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.15);
    margin-bottom:30px;
}

.header-box h2{
    font-size:32px;
    font-weight:bold;
}

.card-menu{
    border-radius:18px;
    color:white;
    padding:30px;
    transition:0.3s;
    cursor:pointer;
    position:relative;
    overflow:hidden;
}

.card-menu:hover{
    transform:translateY(-8px);
    box-shadow:0 15px 25px rgba(0,0,0,0.15);
}

.card-menu h3{
    font-size:38px;
    margin:0;
}

.card-menu p{
    font-size:18px;
    margin:0;
}

.card-menu i{
    position:absolute;
    right:20px;
    top:25px;
    font-size:50px;
    opacity:0.25;
}


.bg1{background:linear-gradient(135deg,#36d1dc,#5b86e5);}
.bg2{background:linear-gradient(135deg,#11998e,#38ef7d);}
.bg3{background:linear-gradient(135deg,#f7971e,#ffd200);}
.bg4{background:linear-gradient(135deg,#fc466b,#3f5efb);}

.footer{
    text-align:center;
    margin-top:30px;
    color:#555;
}

</style>
</head>

<body>

<div class="wrapper-box">


<div class="header-box">
<h2>Halo, <?php echo $_SESSION['username']; ?> 👋</h2>
<p>Dashboard Sistem Informasi Sekolah</p>
</div>


<div class="row">

<div class="col-lg-3 col-md-6 col-12 mb-4">
<a href="starter.php?page=mapel" style="text-decoration:none;">
<div class="card-menu bg1">
<h3><?php echo $jml_mapel; ?></h3>
<p>Data Mapel</p>
<i class="fas fa-book"></i>
</div>
</a>
</div>


<div class="col-lg-3 col-md-6 col-12 mb-4">
<a href="starter.php?page=guru" style="text-decoration:none;">
<div class="card-menu bg2">
<h3><?php echo $jml_guru; ?></h3>
<p>Data Guru</p>
<i class="fas fa-user-tie"></i>
</div>
</a>
</div>

<div class="col-lg-3 col-md-6 col-12 mb-4">
<a href="starter.php?page=kelas" style="text-decoration:none;">
<div class="card-menu bg3">
<h3><?php echo $jml_kelas; ?></h3>
<p>Data Kelas</p>
<i class="fas fa-school"></i>
</div>
</a>
</div>


<div class="col-lg-3 col-md-6 col-12 mb-4">
<a href="starter.php?page=siswa" style="text-decoration:none;">
<div class="card-menu bg4">
<h3><?php echo $jml_siswa; ?></h3>
<p>Data Siswa</p>
<i class="fas fa-users"></i>
</div>
</a>
</div>

</div>


<div class="footer">
Copyright &copy; 2026 Muazijan Pratama
</div>

</div>

</body>
</html>