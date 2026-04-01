<?php
include __DIR__ . "/../config/koneksi.php";

if (!isset($conn)) {
    die("Koneksi tidak ditemukan!");
}
?>
<?php   

$carikode = mysqli_query($conn,"select max(kd_mapel) from mapel") or die (
    mysqli_error($conn));
$datakode = mysqli_fetch_array($carikode);
if($datakode) {
    $nilaikode = substr($datakode[0], 2);
    $kode = (int) $nilaikode;
    $kode = $kode + 1;
    $hasilkode ="M-".str_pad($kode, 3, "0", STR_PAD_LEFT);
} else {$hasilkode ="M-"; }
$_SESSION["KODE"] = $hasilkode;

if (isset($_POST['tambah'])) {

    $kd_mapel = $_POST['kd_mapel'];
    $nm_mapel = $_POST['nm_mapel'];
    $kkm = $_POST['kkm'];

    // VALIDASI
    if (empty($nm_mapel) || empty($kkm)) {
        echo '<div class="alert alert-danger">Data tidak boleh kosong!</div>';
        return;
    }

    if (!is_numeric($kkm)) {
        echo '<div class="alert alert-danger">KKM harus angka!</div>';
        return;
    }

    $insert = mysqli_query($conn, "INSERT INTO mapel (kd_mapel, nm_mapel, kkm) 
    VALUES ('$kd_mapel','$nm_mapel','$kkm')");

    if ($insert) {
        echo '<div class="alert alert-success">Berhasil Disimpan</div>';
        echo '<meta http-equiv="refresh" content="1;url=starter.php?page=mapel">';
    } else {
        echo '<div class="alert alert-danger">Gagal Disimpan</div>';
    }

}


?>
<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="card-body p-2">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="kd_mapel">Kode Mapel</label>
                            <input type="text" name="kd_mapel" value="<?= $hasilkode; ?>" placeholder="Id Kat" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_mapel">Nama Mapel</label>
                            <input type="text" name="nm_mapel" id="nm_mapel" placeholder="Nama Mapel" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kkm">KKM</label>
                            <input type="text" name="kkm" id="kkm" placeholder="KKM" class="form-control">
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="tambah" value="simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>