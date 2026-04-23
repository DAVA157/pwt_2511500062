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

    // validasi kosong
    if (empty($nis) || empty($nm_siswa)) {
        echo '<div class="alert alert-danger">NIS dan Nama wajib diisi!</div>';
    } else {

        // cek NIS
        $cek = mysqli_query($conn, "SELECT * FROM siswa WHERE Nis='$nis'");

        if (mysqli_num_rows($cek) > 0) {

            echo '<div class="alert alert-danger">NIS sudah digunakan!</div>';

        } else {

            // insert siswa
            $insert = mysqli_query($conn, "
                INSERT INTO siswa 
                (Nis, Id_user, Nm_siswa, Jenkel, Hp, Id_kelas) 
                VALUES 
                ('$nis', '$id_user', '$nm_siswa', '$jenkel', '$hp', '$id_kelas')
            ");

            // insert akun login siswa
            $insertuser = mysqli_query($conn, "
                INSERT INTO admin (username, password, role) 
                VALUES ('$nis', '1234', 'siswa')
            ");

            // cek semua berhasil
            if ($insert && $insertuser) {

                echo '<div class="alert alert-success">
                        Data Siswa Berhasil Disimpan
                      </div>';

                echo '<meta http-equiv="refresh" content="1;url=starter.php?page=siswa">';

            } else {

                echo '<div class="alert alert-danger">
                        Gagal Disimpan: ' . mysqli_error($conn) . '
                      </div>';
            }
        }
    }
}
?>
<form method="POST">

    <div class="form-group">
        <label>NIS</label>
        <input type="text" name="nis" class="form-control" required>
    </div>

    <div class="form-group">
        <label>ID User</label>
        <input type="number" name="id_user" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" name="nm_siswa" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <select name="jenkel" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>

    <div class="form-group">
        <label>No HP</label>
        <input type="text" name="hp" class="form-control">
    </div>

    <div class="form-group">
        <label>ID Kelas</label>
        <input type="number" name="id_kelas" class="form-control" required>
    </div>

    <br>

    <button type="submit" name="tambah" class="btn btn-primary">
        Simpan Data
    </button>

</form>