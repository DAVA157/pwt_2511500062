<?php
include __DIR__ . "/../config/koneksi.php";

if (!isset($conn)) {
    die("Koneksi tidak ditemukan!");
}

    
$carikode = mysqli_query($conn, "SELECT MAX(id_kelas) as kode FROM kelas");
$data = mysqli_fetch_array($carikode);
$kode = $data['kode'];


if ($kode == NULL) {
    $urutan = 1;
} else {
    $urutan = (int)$kode + 1;
}

$hasilkode = $urutan;


if (isset($_POST['tambah'])) {

    $id_kelas = $_POST['id_kelas'];
    $nm_kelas = $_POST['nm_kelas'];

    
    if (empty($id_kelas) || empty($nm_kelas)) {
        echo '<div class="alert alert-danger">Data tidak boleh kosong!</div>';
    } else {

        $insert = mysqli_query($conn, "INSERT INTO kelas 
        (id_kelas, nm_kelas) 
        VALUES 
        ('$id_kelas','$nm_kelas')");

        if ($insert) {
            echo '<div class="alert alert-success">Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=kelas">';
        } else {
            echo '<div class="alert alert-danger">Gagal Disimpan</div>';
        }
    }
}
?>

<section class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<form method="POST">

<div class="form-group">
<label>ID Kelas</label>
<input type="number" name="id_kelas" value="<?= $hasilkode ?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>Nama Kelas</label>
<input type="text" name="nm_kelas" class="form-control">
</div>

<br>
<button type="submit" name="tambah" class="btn btn-primary">Simpan</button>

</form>

</div>
</div>
</div>
</div>
</section>