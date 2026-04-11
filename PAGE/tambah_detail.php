<?php
require_once __DIR__ . "/../config/koneksi.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <h1>Tambah Detail Jadwal</h1>
  </div>
</div>

<div class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<?php
if(isset($_POST['tambah'])){

    $kd_mapel    = $_POST['kd_mapel'];
    $kd_guru     = $_POST['kd_guru'];
    $hari        = $_POST['hari'];
    $jam_mulai   = $_POST['jam_mulai'];
    $jam_selesai = $_POST['jam_selesai'];

    $query = mysqli_query($conn, "INSERT INTO detail_jadwal 
    (kd_mapel, kd_guru, hari, jam_mulai, jam_selesai)
    VALUES 
    ('$kd_mapel','$kd_guru','$hari','$jam_mulai','$jam_selesai')");

    if($query){
        echo '<div class="alert alert-success">Data berhasil ditambahkan</div>';
        echo '<meta http-equiv="refresh" content="1;url=starter.php?page=detail">';
    } else {
        echo '<div class="alert alert-danger">Gagal menambahkan data</div>';
    }
}
?>

<form method="POST">

<div class="form-group">
  <label>Mapel</label>
  <select name="kd_mapel" class="form-control" required>
    <option value="">-- Pilih Mapel --</option>
    <?php
    $mapel = mysqli_query($conn, "SELECT * FROM mapel");
    while($m = mysqli_fetch_array($mapel)){
        echo "<option value='$m[kd_mapel]'>$m[nm_mapel]</option>";
    }
    ?>
  </select>
</div>

<br>

<div class="form-group">
  <label>Guru</label>
  <select name="kd_guru" class="form-control" required>
    <option value="">-- Pilih Guru --</option>
    <?php
    $guru = mysqli_query($conn, "SELECT * FROM guru");
    while($g = mysqli_fetch_array($guru)){
        echo "<option value='$g[kd_guru]'>$g[nm_guru]</option>";
    }
    ?>
  </select>
</div>

<br>

<div class="form-group">
  <label>Hari</label>
  <select name="hari" class="form-control" required>
    <option value="">-- Pilih Hari --</option>
    <option>Senin</option>
    <option>Selasa</option>
    <option>Rabu</option>
    <option>Kamis</option>
    <option>Jumat</option>
    <option>Sabtu</option>
  </select>
</div>

<br>

<div class="form-group">
  <label>Jam Mulai</label>
  <input type="time" name="jam_mulai" class="form-control" required>
</div>

<br>

<div class="form-group">
  <label>Jam Selesai</label>
  <input type="time" name="jam_selesai" class="form-control" required>
</div>

<br>

<button type="submit" name="tambah" class="btn btn-primary">
  Simpan
</button>

<a href="starter.php?page=detail" class="btn btn-secondary">
  Kembali
</a>

</form>

</div>
</div>
</div>
</div>