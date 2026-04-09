<?php
include __DIR__ . "/../config/koneksi.php";

if (!isset($conn)) {
    die("Koneksi tidak ditemukan!");
}

// Ambil ID dari URL
$kd = $_GET['kd'];

// Ambil data berdasarkan ID
$edit = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kelas WHERE id_kelas='$kd'"));

// Proses update
if(isset($_POST['simpan'])){
    $id_kelas = $_POST['id_kelas'];
    $nm_kelas = $_POST['nm_kelas'];

    if (empty($nm_kelas)) {
        echo '<div class="alert alert-danger">Nama kelas tidak boleh kosong!</div>';
    } else {

        $update = mysqli_query($conn,"UPDATE kelas SET 
            nm_kelas='$nm_kelas'
            WHERE id_kelas='$id_kelas'
        ");

        if ($update) {
            echo '<div class="alert alert-success">Berhasil Diupdate</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=kelas">';
        } else {
            echo '<div class="alert alert-danger">Gagal Update</div>';
        }
    }
}
?>

<div class="content-header">
<div class="container-fluid">
<h1>Edit Kelas</h1>
</div>
</div>

<section class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<form method="POST">

<div class="form-group">
<label>ID Kelas</label>
<input type="text" name="id_kelas" value="<?= $edit['id_kelas']; ?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Nama Kelas</label>
<input type="text" name="nm_kelas" value="<?= $edit['nm_kelas']; ?>" class="form-control">
</div>

<br>
<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

</form>

</div>
</div>
</div>
</div>
</section>