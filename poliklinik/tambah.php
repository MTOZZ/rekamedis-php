<?php include_once('../header.php'); ?>
<?php 
$query = "SELECT spesialis,id_dokter from tb_dokter";
$sql_rm =mysqli_query($koneksi,$query) or die (mysqli_error($koneksi));

?>
<div class="box">
        <h1>Poliklinik</h1>
        <h4>
            <small>Tambah Data Poliklinik</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-info bt-xs">Data</a>
                <a href="generate.php" class="btn btn-primary bt-xs">Tambah Data Lagi</a>    
        </div>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <input type="hidden" name="total" value="<?=@$_POST['count_add']?>" id="jumlah">
                    <input type="hidden" value="" id='id_dokter' name="id_dokter">
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Gedung</th>
                            <th>Spesialis</th>
                        </tr>
                        <?php 
                        for ($i=1; $i <= $_POST['count_add']; $i++) { ?> 
                            <tr>
                                <td><?=$i?></td>
                                <td>
                                    <input type="text" name="nama-<?=$i?>" class="form-control" required>
                                </td>
                                <td>
                                    <input type="text" name="gedung-<?=$i?>" class="form-control" required>
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
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="tambah" value="Simpan semua" class="btn btn-success">
                    </div>
                </form>
            </div>
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
<?php include_once('../footer.php'); ?>