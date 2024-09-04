<?php
if($_POST){
    $nama=$_POST['nama'];
    $nik=$_POST['nik'];
    $alamat=$_POST['alamat'];
    $gender=$_POST['gender'];
    $no_tlp=$_POST['no_tlp'];
    $id_jabatan=$_POST['id_jabatan'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    if(empty($nama)){
        echo "<script>alert('nama pegawai tidak boleh kosong');location.href='tambahpegawai.php';</script>";

    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambahpegawai.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambahpegawai.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($conn,"insert into pegawai (nama, nik, alamat, kelamin, no_tlp, jabatan, username, password) value ('".$nama."','".$nik."','".$alamat."','".$gender."','".$no_tlp."','".$id_jabatan."','".$username."','".$password."')") or die(mysqli_error($conn));
        if($insert){
            echo "<script>alert('Sukses menambahkan pegawai');location.href='tambahpegawai.php';</script>";
        }   else {
            echo "<script>alert('Gagal menambahkan pegawai');location.href='tambahpegawai.php';</script>";
    
        }
    }
    }
    ?>