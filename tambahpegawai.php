<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <style>
        body {
            background-color: #e9ecef;
            color: #495057;
        }
        .container {
            max-width: 700px;
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: #ffffff;
        }
        .card-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: none;
            border-radius: 15px 15px 0 0;
            text-align: center;
            padding: 20px;
        }
        .form-control, .form-select, .form-textarea {
            border-radius: 10px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            border-radius: 10px;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .btn-primary:focus, .btn-primary:active {
            box-shadow: none;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-group input, .form-group textarea {
            border: 1px solid #ced4da;
            transition: border-color 0.3s ease;
        }
        .form-group input:focus, .form-group textarea:focus {
            border-color: #007bff;
            box-shadow: none;
        }
        .select2-container {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pegawai</h3>
            </div>
            <div class="card-body">
                <form action="prosespegawai.php" method="post">
                    <div class="form-group mb-3">
                        <label for="nama" class="form-label">Nama Pegawai</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" id="nik" name="nik" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" name="alamat" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="form-group mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select id="gender" name="gender" class="form-select" required>
                            <option value="" disabled selected>Pilih Gender</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="no_tlp" class="form-label">Telepon</label>
                        <input type="text" id="no_tlp" name="no_tlp" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="id_jabatan" class="form-label">Jabatan</label>
                        <select id="id_jabatan" name="id_jabatan" class="form-select" required>
                            <option value="" disabled selected>Pilih Jabatan</option>
                            <?php 
                            include "koneksi.php";
                            $qry_jabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                            while ($dt_jabatan = mysqli_fetch_array($qry_jabatan)) {
                                echo '<option value="'.$dt_jabatan['id_jabatan'].'">'.$dt_jabatan['nama_jabatan'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" name="simpan" class="btn btn-primary">Tambah Pegawai</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
