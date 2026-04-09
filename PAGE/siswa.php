<?php
require_once __DIR__ . "/../config/koneksi.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <h1>Data siswa</h1>
  </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];

        $query = mysqli_query($conn, "DELETE FROM siswa WHERE Nis = '$kd'");

        if ($query) {
            echo '<div class="alert alert-warning">Berhasil Dihapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=siswa">';
        }
    }
}
?>

<div class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<a href="starter.php?page=tambah_siswa" class="btn btn-primary btn-sm">
  Tambah siswa
</a>

<br><br>

<table class="table table-striped">
<thead>
<tr>
  <th>No</th>
  <th>Nis</th>
  <th>Id user</th>
  <th>Nama siswa</th>
  <th>Jenis Kelamin</th>
  <th>HP</th>
  <th>Id kelas</th>
  <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php
$no = 0;
$query = mysqli_query($conn, "SELECT * FROM siswa");

while ($result = mysqli_fetch_array($query)) {
    $no++;
?>
<tr>
  <td><?= $no; ?></td>
  <td><?= $result['Nis']; ?></td>
  <td><?= $result['Id_user']; ?></td>
  <td><?= $result['Nm_siswa']; ?></td>
  <td><?= $result['Jenkel']; ?></td>
  <td><?= $result['Hp']; ?></td>
  <td><?= $result['Id_kelas']; ?></td>
  <td>

    <a href="starter.php?page=kelas&action=hapus&kd=<?= $result['Nis']; ?>"
       onclick="return confirm('Yakin ingin hapus?')">
      <span class="badge badge-danger">Hapus</span>
    </a>

    <a href="starter.php?page=edit_siswa&kd=<?= $result['Nis']; ?>">
      <span class="badge badge-warning">Edit</span>
    </a>

  </td>
</tr>
<?php } ?>
</tbody>

</table>

</div>
</div>
</div>
</div>