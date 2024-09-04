<?php
include "koneksi.php";

// Adjust the column names according to your database schema
$qry_pegawai = mysqli_query($conn, "
    SELECT pegawai.id_pegawai, pegawai.nik, pegawai.nama, pegawai.alamat, pegawai.kelamin, pegawai.no_tlp, 
           jabatan.nama_jabatan as jabatan, pegawai.username
    FROM pegawai
    JOIN jabatan ON jabatan.id_jabatan = pegawai.id_pegawai
");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tampil Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
        }
        .table thead th {
            background-color: #007bff;
            color: #ffffff;
        }
        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn {
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h3 class="mb-4">Daftar Pegawai</h3>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelamin</th>
                    <th>No Telepon</th>
                    <th>Jabatan</th>
                    <th>Username</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                while ($data_pegawai = mysqli_fetch_array($qry_pegawai)) {
                    $no++;
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $data_pegawai['id'] ?></td>
                    <td><?= $data_pegawai['nik'] ?></td>
                    <td><?= $data_pegawai['nama'] ?></td>
                    <td><?= $data_pegawai['alamat'] ?></td>
                    <td><?= $data_pegawai['kelamin'] ?></td>
                    <td><?= $data_pegawai['no_tlp'] ?></td>
                    <td><?= $data_pegawai['jabatan'] ?></td>
                    <td><?= $data_pegawai['username'] ?></td>
                    <td>
                        <a href="ubah.php?id=<?= $data_pegawai['id'] ?>" class="btn btn-success btn-sm">Ubah</a>
                        <a href="hapus.php?id=<?= $data_pegawai['id'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger btn-sm">Hapus</a>
                    </td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
