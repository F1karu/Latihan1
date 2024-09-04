<?php
include "koneksi.php"; 


if(isset($_GET['id_pegawai']) && is_numeric($_GET['id_pegawai'])) {
    
    $id_pegawai = $_GET['id_pegawai'];

    
    $query_get_pegawai = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai");

    
    $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
    
    
    if(mysqli_num_rows($query_get_pegawai) > 0) {
        $data_pegawai = mysqli_fetch_assoc($query_get_pegawai); 
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah pegawai</title>
</head>
<body>
    <h3>Ubah Data pegawai</h3>
    <form method="post" action="proses_ubah.php"> 
        <input type="hidden" name="id_pegawai" value="<?=$id_pegawai?>"> 
        <label>Nama pegawai:</label>
        <input type="text" name="nama_pegawai" value="<?=$data_pegawai['nama_pegawai']?>"><br>
        <label>NIK:</label>
        <input type="text" name="nik" value="<?=$data_pegawai['nik']?>"><br>
        <label>Alamat:</label>
        <input type="text" name="alamat" value="<?=$data_pegawai['alamat']?>"><br>
        <label>Gender:</label>
        <select name="gender" class="form-control">
            <option value="L" <?=($data_pegawai['gender'] == 'L') ? 'selected' : ''?>>Laki-laki</option>
            <option value="P" <?=($data_pegawai['gender'] == 'P') ? 'selected' : ''?>>Perempuan</option>
            <label>Telepon:</label>
        <input type="text" name="no_tlp" value="<?=$data_pegawai['no_tlp']?>"><br>
        </select><br>
        <label>Jabatan:</label>
        <select name="id_jabatan" class="form-control">
            <?php
    
            while($data_jabatan = mysqli_fetch_array($qry_jabatan)) {
                echo '<option value="'.$data_jabatan['id_jabatan'].'" '.($data_jabatan['id_jabatan'] == $data_pegawai['id_jabatan'] ? 'selected' : '').'>'.$data_jabatan['nama_jabatan'].'</option>'; 
            }
            ?>
        </select><br>
        
        <input type="submit" value="Simpan">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>

<?php
    } else {
        echo "Data pegawai tidak ditemukan.";
    }
} else {
    echo "ID pegawai tidak valid.";
}
?>