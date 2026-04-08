<?php
require_once __DIR__ . "/../config/koneksi.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <h1>Data Guru</h1>
  </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];

        $query = mysqli_query($koneksi, "DELETE FROM guru WHERE kd_guru = '$kd'");

        if ($query) {
            echo '<div class="alert alert-warning">Berhasil Dihapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=guru">';
        }
    }
}
?>

<div class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<a href="starter.php?page=tambah_guru" class="btn btn-primary btn-sm">
  Tambah Guru
</a>

<br><br>

<table class="table table-striped">
<thead>
<tr>
  <th>No</th>
  <th>Kode Guru</th>
  <th>Nama Guru</th>
  <th>Jenis Kelamin</th>
  <th>Pendidikan</th>
  <th>HP</th>
  <th>Alamat</th>
  <th>Aksi</th>
</tr>
</thead>

<tbody>
<?php
$no = 0;
$query = mysqli_query($conn, "SELECT * FROM guru");

while ($result = mysqli_fetch_array($query)) {
    $no++;
?>
<tr>
  <td><?= $no; ?></td>
  <td><?= $result['kd_guru']; ?></td>
  <td><?= $result['nm_guru']; ?></td>
  <td><?= $result['jenkel']; ?></td>
  <td><?= $result['pend_terakhir']; ?></td>
  <td><?= $result['hp']; ?></td>
  <td><?= $result['alamat']; ?></td>
  <td>

    <a href="starter.php?page=guru&action=hapus&kd=<?= $result['kd_guru']; ?>"
       onclick="return confirm('Yakin ingin hapus?')">
      <span class="badge badge-danger">Hapus</span>
    </a>

    <a href="starter.php?page=edit_guru&kd=<?= $result['kd_guru']; ?>">
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