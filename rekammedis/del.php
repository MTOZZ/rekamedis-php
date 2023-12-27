<?php
require_once "../_config/config.php";

mysqli_query($koneksi, "DELETE FROM tb_rekamedis WHERE id_rm='$_GET[id]'") or die (mysqli_error($koneksi));
echo "<script>window.location='data.php';</script>";
?>