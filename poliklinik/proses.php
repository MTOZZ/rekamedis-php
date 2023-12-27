<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['tambah'])){
    $total = $_POST['total'];
    for ($i=1; $i<=$total ; $i++) { 
        $uuid = Uuid::uuid4()->toString();
        $nama = trim(mysqli_real_escape_string($koneksi, $_POST['nama-'.$i]));
        $gedung = trim(mysqli_real_escape_string($koneksi, $_POST['gedung-'.$i]));
        $id = $_POST['id_dokter'];
        $sql = mysqli_query($koneksi, "INSERT INTO tb_poliklinik (id_dokter,id_poli,nama_poli,gedung) VALUES ('$id','$uuid','$nama','$gedung')") or die (mysqli_error($koneksi));
    }
    if($sql){
        echo "<script>alert('".$total." data berhasil ditambahkan'); window.location='data.php';</script>";
    }else{
        echo "<script>alert('Data gagal ditambahkan'); window.location='generate.php';</script>";
    }
}else if(isset($_POST['edit'])){
for ($i=0; $i<count($_POST['id']) ; $i++) { 
    $id =$_POST['id'][$i];
    $nama = $_POST['nama'][$i];
    $gedung = $_POST['gedung'][$i];
    $sql = mysqli_query($koneksi, "UPDATE tb_poliklinik SET nama_poli = '$nama', gedung ='$gedung' WHERE id_poli='$id'") or die (mysqli_error($koneksi));
}
    echo "<script>alert('data berhasil diedit'); window.location='data.php';</script>";
}
?>