<?php 
require_once "../_config/config.php";

$chk = $_POST['checked'];
if(!isset($chk)){
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
}else{
    foreach($chk as $id){
        $sql = mysqli_query($koneksi,"DELETE FROM tb_dokter WHERE id_dokter='$id'") or die (mysqli_error($koneksi));
    }
    if($sql){
        echo "<script>alert('".count($chk)." data berhasil dihapus'); window.location='data.php';</script>";
    }else{
        echo "<script>alert('Data gagal dihapus'); window.location='data.php';</script>";
    }
}
?>