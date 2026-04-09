<?php
include __DIR__ . "/../config/koneksi.php";

if (!isset($conn)) {
    die("Koneksi tidak ditemukan!");
}

if (isset($_POST['tambah'])) {
    
    $nis      = $_POST['nis'];
    $id_user  = $_POST['id_user'];
    $nm_siswa = $_POST['nm_siswa'];
    $jenkel   = $_POST['jenkel'];
    $hp       = $_POST['hp'];
    $id_kelas = $_POST['id_kelas'];

    
    if (empty($nis) || empty($nm_siswa)) {
        echo '<div class="alert alert-danger">NIS dan Nama Siswa tidak boleh kosong!</div>';
    } else {
       
        $insert = mysqli_query($conn, "INSERT INTO siswa 
        (Nis, Id_user, Nm_siswa, Jenkel, Hp, Id_kelas) 
        VALUES 
        ('$nis', '$id_user', '$nm_siswa', '$jenkel', '$hp', '$id_kelas')");

        if ($insert) {
            echo '<div class="alert alert-success">Data Siswa Berhasil Disimpan</div>';
            echo '<meta http-equiv="refresh" content="1;url=starter.php?page=siswa">';
        } else {
            // Cek jika error karena NIS duplikat
            echo '<div class="alert alert-danger">Gagal Disimpan: ' . mysqli_error($conn) . '</div>';
        }
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Siswa</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="nis" class="form-control" maxlength="10" placeholder="Masukkan NIS..." required>
                    </div>

                    <div class="form-group">
                        <label>ID User</label>
                        <input type="number" name="id_user" class="form-control" placeholder="Masukkan ID User...">
                    </div>

                    <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="nm_siswa" class="form-control" maxlength="50" placeholder="Nama Lengkap...">
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenkel" class="form-control">
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input type="text" name="hp" class="form-control" maxlength="13" placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="form-group">
                        <label>ID Kelas</label>
                        <input type="number" name="id_kelas" class="form-control" placeholder="Masukkan ID Kelas...">
                    </div>

                    <br>
                    <button type="submit" name="tambah" class="btn btn-primary">Simpan Data Siswa</button>
                    <a href="starter.php?page=siswa" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</section>