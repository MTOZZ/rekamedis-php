<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])){
    $uuid = Uuid::uuid4()->toString();
    $pasien = trim(mysqli_real_escape_string($koneksi, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($koneksi, $_POST['klhn']));
    $dokter = trim(mysqli_real_escape_string($koneksi, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($koneksi, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($koneksi, $_POST['poli']));
    $tanggal = trim(mysqli_real_escape_string($koneksi, $_POST['tgl']));
    
    mysqli_query($koneksi, "INSERT INTO tb_rekamedis (id_rm,id_pasien,keluhan,id_dokter,diagnosa,id_poli,tgl_periksa) VALUES ('$uuid','$pasien','$keluhan','$dokter','$diagnosa','$poli','$tanggal')") or die (mysqli_error($koneksi));
    $obat = $_POST['obat'];
    foreach($obat as $ob){
        mysqli_query($koneksi, "INSERT INTO tb_rm_obat (id_rm,id_obat) VALUES ('$uuid','$ob')") or die (mysqli_error($koneksi));
    }
    echo "<script>window.location='data.php';</script>";
}else if(isset($_POST['edit']))
    // $id = $_POST['id'];
    // $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama']));
    // $spesialis = trim(mysqli_real_escape_string($koneksi, $_POST['spesialis']));
    // $alamat = trim(mysqli_real_escape_string($koneksi, $_POST['alamat']));
    // $telp = trim(mysqli_real_escape_string($koneksi, $_POST['telp']));
    // mysqli_query($koneksi, "UPDATE tb_dokter SET nama_dokter='$nama',
    //                         spesialis='$spesialis',alamat='$alamat',
    //                         no_telepon='$telp' WHERE id_dokter ='$id'") 
    //                         or die (mysqli_error($koneksi));
    // echo "<script>window.location='data.php';</script>";
?>