<?php
include __DIR__ . "/../config/koneksi.php";

if (!isset($conn)) {
    die("Koneksi tidak ditemukan!");
}

// Ambil NIS dari URL
$kd = $_GET['kd'];

// Ambil data siswa
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM siswa WHERE Nis='$kd'")
);

if (!$data) {
    die("Data tidak ditemukan!");
}

// Proses update
if (isset($_POST['simpan'])) {

    $id_user  = $_POST['id_user'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel   = $_POST['jenkel'];
    $hp       = $_POST['hp'];
    $id_kelas = $_POST['id_kelas'];

    if (empty($nm_siswa) || empty($jenkel) || empty($id_kelas)) {
        echo '<div class="alert alert-danger">Data tidak boleh kosong!</div>';
    } else {

        $update = mysqli_query($conn, "UPDATE siswa SET
            Id_user='$id_user',
            Nm_siswa='$nm_siswa',
            Jenkel='$jenkel',
            Hp='$hp',
            Id_kelas='$id_kelas'
            WHERE Nis='$kd'
        ");

        if ($update) {
            echo '<div class="alert alert-success">Data berhasil diupdate</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=siswa">';
        } else {
            echo '<div class="alert alert-danger">Gagal: ' . mysqli_error($conn) . '</div>';
        }
    }
}
?>

<section class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<h3>Edit Data Siswa</h3>

<form method="POST">

<div class="form-group">
<label>NIS</label>
<input type="text" value="<?= $data['Nis']; ?>" class="form-control" readonly>
</div>

<div class="form-group">
<label>ID User</label>
<input type="number" name="id_user" value="<?= $data['Id_user']; ?>" class="form-control">
</div>

<div class="form-group">
<label>Nama Siswa</label>
<input type="text" name="nm_siswa" value="<?= $data['Nm_siswa']; ?>" class="form-control">
</div>

<div class="form-group">
<label>Jenis Kelamin</label>
<select name="jenkel" class="form-control">
    <option value="Laki-laki" <?= $data['Jenkel']=='Laki-laki'?'selected':'' ?>>Laki-laki</option>
    <option value="Perempuan" <?= $data['Jenkel']=='Perempuan'?'selected':'' ?>>Perempuan</option>
</select>
</div>

<div class="form-group">
<label>HP</label>
<input type="text" name="hp" value="<?= $data['Hp']; ?>" class="form-control">
</div>

<div class="form-group">
<label>ID Kelas</label>
<input type="number" name="id_kelas" value="<?= $data['Id_kelas']; ?>" class="form-control">
</div>

<br>

<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

<a href="starter.php?page=siswa" class="btn btn-secondary">Kembali</a>

</form>

</div>
</div>
</div>
</div>
</section>