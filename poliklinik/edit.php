<?php 
$chk = $_POST['checked'];
if(!isset($chk)){
    echo "<script>alert('Tidak ada data yang dipilih'); window.location='data.php';</script>";
}else{
include_once('../header.php'); ?>
<?php 
$query = "SELECT spesialis,id_dokter from tb_dokter";
$sql_rm =mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

?>
<div class="box">
        <h1>Poliklinik</h1>
        <h4>
            <small>Edit Data Poliklinik</small>
            <div class="pull-right">
            <a href="data.php" class="btn btn-warning bt-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>  
        </div>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <input type="hidden" name="total" value="<?=@$_POST['count_add']?>">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Gedung</th>
                            <th>Spesialis</th>
                        </tr>
                        <?php
                        $no=1;
                        foreach($chk as $id){
                            $sql_poli = mysqli_query($koneksi, "SELECT * FROM tb_poliklinik WHERE id_poli ='$id'") or die (mysqli_error($koneksi));
                            while($data = mysqli_fetch_array($sql_poli)){
                        ?> 
                            <tr>
                                <td><?=$no++?></td>
                                <td>
                                    <input type="hidden" name="id[]" value="<?=$data['id_poli']?>">
                                    <input type="text" name="nama[]" value="<?=$data['nama_poli']?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="gedung[]" value="<?=$data['gedung']?>" class="form-control" required>
                                </td>
                                <td>
                                    <select name="" id="activitySelector">
                                        <?php foreach($sql_rm as $key):?>
                                            <option value="<?php echo $key['id_dokter']?>"><?php echo $key['spesialis']?></option>
                                            <?php endforeach;?>
                                    </select>
                                </td>
                            </tr>
                        <?php 
                        }   
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan semua" class="btn btn-success">
                    </div>
                </form>
            </div>
            <script>
            // const coba = document.getElementsByTagName('select')[0];
            const id_dokter = document.getElementById('id_dokter');
            // var jumlah = document.getElementById('jumlah').value;

            var activities = document.getElementById("activitySelector");
            var options1 = activities.querySelectorAll("option");
                var count = options1.length;
            activities.addEventListener("click", function() {
                for (let i = 0; i < count; i++) {
                    document.getElementById('id_dokter').value = activities.value;  
                }
            });

           
            
        </script>
        </div>
<?php include_once('../footer.php'); 
}?>