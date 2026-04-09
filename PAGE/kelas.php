<?php
require_once __DIR__ . "/../config/koneksi.php";
?>

<div class="content-header">
  <div class="container-fluid">
    <h1>Data kelas</h1>
  </div>
</div>

<?php
if (isset($_GET['action'])) {
    if ($_GET['action'] == "hapus") {
        $kd = $_GET['kd'];

        $query = mysqli_query($conn, "DELETE FROM kelas WHERE id_kelas = '$kd'");

        if ($query) {
            echo '<div class="alert alert-warning">Berhasil Dihapus</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=kelas">';
        }
    }
}
?>

<div class="content">
<div class="container-fluid">
<div class="card">
<div class="card-body">

<a href="starter.php?page=tambah_kelas" class="btn btn-primary btn-sm">
  Tambah kelas
</a>

<br><br>

<table class="table table-striped">
<thead>
<tr>
  <th>no</th>
  <th>id_kelas</th>
  <th>nm_kelas</th>
</tr>
</thead>

<tbody>
<?php
$no = 0;
$query = mysqli_query($conn, "SELECT * FROM kelas");

while ($result = mysqli_fetch_array($query)) {
    $no++;
?>
<tr>
  <td><?= $no; ?></td>
  <td><?= $result['id_kelas']; ?></td>
  <td><?= $result['nm_kelas']; ?></td>
  <td>

    <a href="starter.php?page=kelas&action=hapus&id=<?= $result['id_kelas']; ?>"
       onclick="return confirm('Yakin ingin hapus?')">
      <span class="badge badge-danger">Hapus</span>
    </a>

    <a href="starter.php?page=edit_kelas&kd=<?= $result['id_kelas']; ?>">
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