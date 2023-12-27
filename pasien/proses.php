<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])){
    $uuid = Uuid::uuid4()->toString();
    $identitas = trim(mysqli_real_escape_string($koneksi, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jkel = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    $sql_chk_identitas = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE nomor_identitas='$identitas'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($sql_chk_identitas) > 0){
        echo "<script>alert('Nomor Identitas yang dimasukkan sudah ada');window.location='tambah.php';</script>";
    }else{
        mysqli_query($koneksi, "INSERT INTO tb_pasien (id_pasien,nomor_identitas,nama_pasien,
                                jenis_kelamin,alamat,no_telpon) VALUES ('$uuid','$identitas','$nama','$jkel','$alamat','$telp')") 
                                or die (mysqli_error($koneksi));
        echo "<script>window.location='data.php';</script>";
    }
}else if(isset($_POST['edit'])){
    $id=$_POST['id'];
    $identitas = trim(mysqli_real_escape_string($koneksi, $_POST['identitas']));
    $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    $jkel = trim(mysqli_real_escape_string($koneksi, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    $sql_chk_identitas = mysqli_query($koneksi, "SELECT * FROM tb_pasien WHERE nomor_identitas='$identitas' AND id_pasien != '$id'") or die (mysqli_error($koneksi));
    if(mysqli_num_rows($sql_chk_identitas) > 0){
    echo "<script>alert('Nomor Identitas yang dimasukkan sudah ada');window.location='edit.php?id=$id';</script>";
    }else{
    mysqli_query($koneksi, "UPDATE tb_pasien SET nomor_identitas='$identitas',
                    nama_pasien='$nama',jenis_kelamin='$jkel',alamat='$alamat',
                    no_telpon='$telp' WHERE id_pasien='$id'") or die (mysqli_error($koneksi));
    echo "<script>window.location='data.php';</script>";
    }
}
?>